<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProductController extends Controller
{

   /**
     * Display a listing of the resource.
     */
    public function dashboard(Admin $url,Request $request)
    {
        $url = 'admin';
        $products = Product::latest()->get();
        return view('admin.dashboard', compact('products','url'));
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
            'product_title' => 'required|string|max:255',
            
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            
            'product_price' => 'nullable|string',
            'product_description' => 'nullable|string',
            'product_status' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_quantity' => 'required',
            'product_review' => 'required',
            'product_rating' => 'required',
        ]);

        $filePath = $request->file('file')->store('products', 'public');

        Product::create([
            'product_title' => $request->product_title,
            'file_path' => $filePath,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_status' => $request->product_status,
            'product_category' => $request->product_category,
            'product_quantity' => $request->product_quantity,
            'product_review' => $request->product_review,
            'product_rating' => $request->product_rating,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'product_description' => 'nullable|string',
            'product_status' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_quantity' => 'required',
            'product_review' => 'required',
            'product_rating' => 'required',
        ]);

        $data = [
            'product_title' => $request->title,
            'product_description' => $request->description,
            'product_status' => $request->status,
            'product_category' => $request->category,
            'product_quantity' => $request->quantity,
            'product_review' => $request->review,
            'product_rating' => $request->rating,
        ];

        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($product->file_path);
            
            // Store new file
            $data['file_path'] = $request->file('file')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'product updated successfully.');
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

        return redirect()->route('products.index')
            ->with('success', 'product deleted successfully.');
    }
}
