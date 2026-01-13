<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin;
use DB;

class ProductController extends Controller
{
   /**
     * Display a 
      of the resource.
     */
    public function dashboard(Admin $url,Request $request)
    {
        $url = 'admin';
        $pro = DB::table('products')->orderBy('updated_at', 'desc')->get();
        $una = DB::table('products')->where('product_status','unassign')->orderBy('updated_at', 'desc')->get();
        $ord = DB::table('products')->where('product_status','ordered')->orderBy('updated_at', 'desc')->get();
        $pre = DB::table('products')->where('product_status','prepared')->orderBy('updated_at', 'desc')->get();
        $del = DB::table('products')->where('product_status','delivered')->orderBy('updated_at', 'desc')->get();
        $pen = DB::table('products')->where('product_status','pending')->orderBy('updated_at', 'desc')->get();
        $arc = DB::table('products')->where('product_status','archive')->orderBy('updated_at', 'desc')->get();

        return view('admin.dashboard', compact('pro','una','ord','pre','del','pen','url'));
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
            'file_status' => 'required|string|max:255',
            
            'product_name' => 'required|string|max:255',
            'product_price' => 'nullable|string',
            'product_description' => 'nullable|string',
            'product_status' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_section' => 'required|string|max:255',
            'product_subsection' => 'required|string|max:255',
            'product_brand' => 'required|string|max:255',
            'product_stock' => 'required',
            'product_quantity' => 'nullable|string',
        ]);

        $filePath = $request->file('file_path')->store('images','public');

        Product::create([
            
            'admin_id' => $request->admin_id,

            'file_path' => $filePath,
            'file_keywords' => $request->file_keywords,
            'file_description' => $request->file_description,
            'file_status' => $request->file_status,

            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_status' => $request->product_status,
            'product_category' => $request->product_category,
            'product_section' => $request->product_section,
            'product_subsection' => $request->product_subsection,
            'product_brand' => $request->product_brand,
            'product_stock' => $request->product_stock,
            'product_quantity' => $request->product_quantity,
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $url, Product $id,Request $request)
    {
        $url = 'admin';
        Product::find($id);

        return view('admin.show', compact('url','id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $url, Product $id)
    {
        $url = 'admin';
        Product::find($id);
        return view('admin.edit', compact('id','url'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $id)
    {
        
        $url = 'admin';
        
        Product::find($id);

        $id->admin_id = $request->get('admin_id');

        $id->file_path = $request->get('file_path');
        $id->file_keywords = $request->get('file_keywords');
        $id->file_description = $request->get('file_description');
        $id->file_status = $request->get('file_status');
        
        $id->product_name = $request->get('product_name');
        $id->product_price = $request->get('product_price');
        $id->product_description = $request->get('product_description');
        $id->product_status = $request->get('product_status');
        $id->product_category = $request->get('product_category');
        $id->product_section = $request->get('product_section');
        $id->product_subsection = $request->get('product_subsection');
        $id->product_brand = $request->get('product_brand');
        $id->product_stock = $request->get('product_stock');
        $id->product_quantity = $request->get('product_quantity');

        $id->save();
        return redirect()->route('admin.dashboard');
    }

    /**
     * Show specified region.
     */
    public function report(Admin $url, Product $id, Request $request)
    {
        $url = 'admin';
        Product::find($id);
        return view('admin.report', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $id, Request $request)
    {
        // Delete the file from storage
        Storage::disk('public')->delete($id->file_path);
        // Delete the record
        $id->delete();
        return redirect()->route('admin.dashboard')
            ->with('success', 'product deleted successfully.');
    }
}
