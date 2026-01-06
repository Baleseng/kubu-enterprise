<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin;
use DB;

class ProductController extends Controller
{

   /**
     * Display a listing of the resource.
     */
    public function dashboard(Admin $url,Request $request)
    {
        $url = 'admin';
        
        $product = DB::table('products')
        ->where('product_instock','In')
        ->orderBy('updated_at', 'desc')->get();

        $delivered = DB::table('products')
        ->where('product_status','delivered')
        ->orderBy('updated_at', 'desc')->get();

        $ordered = DB::table('products')
        ->where('product_status','ordered')
        ->orderBy('updated_at', 'desc')->get();

        $pending = DB::table('products')
        ->where('product_status','pending')
        ->orderBy('updated_at', 'desc')->get();

        return view('admin.dashboard', compact('product','delivered','ordered','pending','url'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin';
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'admin_id' => 'required',

            'file_path' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'file_keywords' => 'required|string|max:255',
            'file_description' => 'required|string|max:255',
            
            'product_name' => 'required|string|max:255',
            'product_price' => 'nullable|string',
            'product_description' => 'nullable|string',
            'product_status' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_type' => 'required|string|max:255',
            'product_brand' => 'required|string|max:255',
            'product_instock' => 'required',
            'product_quantity' => 'nullable|string',
        ]);

        $filePath = $request->file('file_path')->store('public');

        Product::create([
            
            'admin_id' => $request->admin_id,

            'file_path' => $filePath,
            'file_keywords' => $request->file_keywords,
            'file_description' => $request->file_description,

            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_status' => $request->product_status,
            'product_category' => $request->product_category,
            'product_type' => $request->product_type,
            'product_brand' => $request->product_brand,
            'product_instock' => $request->product_instock,
            'product_quantity' => $request->product_quantity,
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'product_description' => 'nullable|string',
            'product_status' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_instock' => 'required',
        ]);

        $data = [
            'product_name' => $request->product_name,
            'product_description' => $request->description,
            'product_status' => $request->status,
            'product_category' => $request->category,
            'product_instock' => $request->instock,
        ];

        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($product->file_path);
            
            // Store new file
            $data['file_path'] = $request->file('file_path')->store('public');
        }

        $product->update($data);

        return redirect()->route('admin.dashboard')
            ->with('success', 'product updated successfully.');
    }

    /**
     * Show specified region.
     */
    public function region(Product $product)
    {
        return view('admin.region', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the file from storage
        Storage::disk('public')->delete($product->file_path);
        
        // Delete the record
        $product->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'product deleted successfully.');
    }
}
