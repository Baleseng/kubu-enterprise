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

            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string|max:255',
            'position' => 'nullable|integer|min:1',
            'urlfolder' => 'required|string|max:255',
        ]);

        Section::create([
            
            'admin_id' => $request->admin_id,

            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'position' => $request->position,
            'urlfolder' => $request->urlfolder,
        ]);

        return redirect()->route('admin.sections.index')
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
    public function edit(Admin $url, Section $id)
    {
        $url = 'admin';
        Section::find($id);
        return view('admin.sections.edit', compact('id','url'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
            'position' => 'required|integer|min:1',
        ]);

        $id->update($validated);
        return redirect()->route('admin.sections.index')->with('success', 'section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
