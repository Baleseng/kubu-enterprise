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
    public function index(Admin $url,Request $request)
    {
        $url = 'admin';
        $product = DB::table('products')->orderBy('updated_at', 'desc')->get();
        $product_unassign = DB::table('products')->where('status','unassign')->orderBy('updated_at', 'desc')->get();
        $product_ordered = DB::table('products')->where('status','ordered')->orderBy('updated_at', 'desc')->get();
        $product_prepared = DB::table('products')->where('status','prepared')->orderBy('updated_at', 'desc')->get();
        $product_deliver = DB::table('products')->where('status','delivered')->orderBy('updated_at', 'desc')->get();
        $product_pending = DB::table('products')->where('status','pending')->orderBy('updated_at', 'desc')->get();
        $product_archive = DB::table('products')->where('status','archive')->orderBy('updated_at', 'desc')->get();

        return view('admin.products.index', compact(
            'product',
            'product_unassign',
            'product_ordered',
            'product_prepared',
            'product_deliver',
            'product_pending',
            'product_archive',
            'url'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin';
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'admin_id' => 'required',
            'urlfolder' => 'required|string|max:255',

            'file_path' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'specialsection' => 'required|string|max:255',
            'firstcategory' => 'required|string|max:255',
            'secondcategory' => 'required|string|max:255',
            'thirdcategory' => 'required|string|max:255',

            'brand' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'nullable|string',
            'description' => 'nullable|string',

            'status' => 'required|string|max:255',
            'stock' => 'required',
            'quantity' => 'nullable|string',

            'file_keywords' => 'required|string|max:255',
            'file_description' => 'required|string|max:255',
            'file_status' => 'required|string|max:255',
        ]);

        $filePath = $request->file('file_path')->store('images','public');

        Product::create([
            
            'admin_id' => $request->admin_id,
            'urlfolder' => $request->urlfolder,

            'file_path' => $filePath,
            'specialsection' => $request->specialsection,
            'firstcategory' => $request->firstcategory,
            'secondcategory' => $request->secondcategory,
            'thirdcategory' => $request->thirdcategory,
            
            'brand' => $request->brand,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            
            'stock' => $request->stock,
            'quantity' => $request->quantity,

            'file_keywords' => $request->file_keywords,
            'file_description' => $request->file_description,
            'file_status' => $request->file_status,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $url, Product $id)
    {
        $url = 'admin';
        Product::find($id);
        return view('admin.products.edit', compact('id','url'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function archive(Admin $url, Product $id)
    {
        $url = 'admin';
        Product::find($id);
        return view('admin.products.show', compact('id','url'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function publish(Admin $url, Product $id)
    {
        $url = 'admin';
        Product::find($id);
        return view('admin.products.show', compact('id','url'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $id)
    {

        $validated = $request->validate([
            'file_path' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'file_keywords' => 'required|string|max:255',
            'file_description' => 'required|string|max:255',
            'file_status' => 'required|string|max:255',
            
            'name' => 'required|string|max:255',
            'price' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'subsection' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'stock' => 'required',
            'quantity' => 'nullable|string',
        ]);

        if ($request->hasFile('file_path')) {
            // Delete old image if it exists
            if ($id->file_path) {
                Storage::disk('public')->delete($id->file_path);
            }

            // Store new image and get the path
            $path = $request->file('file_path')->store('images', 'public');
            $validated['file_path'] = $path;
        }

        $id->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'product updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $url, Product $id,Request $request)
    {
        $url = 'admin';
        Product::find($id);

        return view('admin.products.show', compact('url','id'));
    }

    /**
     * Show specified region.
     */
    public function report(Admin $url, Product $id, Request $request)
    {
        $url = 'admin';
        Product::find($id);
        return view('admin.products.report', compact('id'));
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
