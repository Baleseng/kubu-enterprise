<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
use App\Models\Report;
use App\Models\Admin;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    /**
     * Display a 
      of the resource.
     */
    public function dashboard(Admin $url,Request $request)
    {
        $url = 'admin';

        $product = DB::table('products')->orderBy('updated_at', 'desc')->get();
        $section = DB::table('sections')->orderBy('updated_at', 'desc')->get();  
        $customer = DB::table('users')->orderBy('updated_at', 'desc')->get();
        $admin = DB::table('admins')->orderBy('updated_at', 'desc')->get();
        $report = DB::table('reports')->orderBy('updated_at', 'desc')->get();

        return view('admin.dashboard', compact('product','section','customer','admin','report','url'));
    }

    public function region(Request $request)
    {
        $url = 'admin';
        return view('admin.region.index', compact('url'));
    }


    public function index(Request $request)
    {
        $url = 'admin';
        $user = DB::table('admins')->get();
        return view('admin.members.index', compact('user','url'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $id, Request $request)
    {
        $url = 'admin';
        Admin::find($id);
        return view('admin.members.show', compact('url','id'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $id, Request $request)
    {
        // Delete the file from storage
        Storage::disk('public')->delete($id->file_path);
        // Delete the record
        $id->delete();
        return redirect()->route('admin.dashboard')
            ->with('success', 'product deleted successfully.');
    }

}
