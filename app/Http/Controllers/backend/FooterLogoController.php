<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\FooterLogo;
use Illuminate\Http\Request;

class FooterLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footer= FooterLogo::first();
        return view('backend.footer-logo.index',compact('footer'));
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
        //
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
        $request->validate([
            'title_az' => ['required','max:200'],
            'title_en' => ['required','max:200'],
            'title_ru' => ['required','max:200'],
            'sub_title_az' => ['required','max:1000'],
            'sub_title_en' => ['required','max:1000'],
            'sub_title_ru' => ['required','max:1000'],
            'image' => ['image']
        ]);
        $footer = FooterLogo::first();
        if($request->hasFile('image')){
            $imagePath = handleUpload('image');
        }
        FooterLogo::updateOrCreate(
            ['id' => $id],
            [
                'title_az' => $request->title_az,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru,
                'sub_title_az' => $request->sub_title_az,
                'sub_title_en' => $request->sub_title_en,
                'sub_title_ru' => $request->sub_title_ru,
                'image' => (!empty($imagePath) ? $imagePath : $footer?->image),
            ]

        );
        toastr()->success('Uğurla yeniləndi', 'Congrats');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
