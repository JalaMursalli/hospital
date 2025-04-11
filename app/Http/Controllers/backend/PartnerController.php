<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $partners = Partner::when($search, function ($query, $search) {
            return $query->where('partners', 'like', "%{$search}%");
        })->paginate(10);

        return view('backend.partners.index', compact('search', 'partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partner = new Partner();
        return view('backend.partners.create',compact('partner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required','image']
        ]);
        $imagePath = handleUpload('image');
        $partner = new Partner();
        $partner->image = $imagePath;
        $partner->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.partner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('backend.partners.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'image' => ['required','image']
        ]);
        $imagePath = handleUpload('image');
        $partner = Partner::findOrFail($id);
        $partner->image = (!empty($imagePath)? $imagePath : $partner->image );
        $partner->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.partner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        deleteFileIfExist(filePath: $partner->image);
        $partner->delete();
        return redirect()->route('backend.partner.index')->with('success', 'Uğurla silindi!');
    }
}
