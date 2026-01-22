<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Product;
use App\Models\Admin;
use DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = 'admin';
        $section = DB::table('sections')->get();
        return view('admin.sections.index', compact('section','url'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin';
        return view('admin.sections.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'admin_id' => 'required',

            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
            'folder' => 'required|string|max:255',
        ]);

        Section::create([
            
            'admin_id' => $request->admin_id,

            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'folder' => $request->folder,
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
