<?php

namespace App\Http\Controllers;

use App\Models\EhekimApplication;
use Illuminate\Http\Request;

class EhekimApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        $applies = EhekimApplication::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('backend.ehekim-apply.index', compact('search', 'applies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $apply = EhekimApplication::findOrFail($id);
        return view('backend.ehekim-apply.show', compact('apply'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $apply = EhekimApplication::findOrFail($id);
        $apply->delete();
        return redirect()->back()->with('success', 'Uğurla silindi!');
    }
}
