<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Emergency;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emergency = Emergency::first();
        return view('backend.emergency.index',compact('emergency'));
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
            'title1_az' => ['required','max:200'],
            'title1_en' => ['required','max:200'],
            'title1_ru' => ['required','max:200'],
            'title2_az' => ['required','max:200'],
            'title2_en' => ['required','max:200'],
            'title2_ru' => ['required','max:200'],
            'title3_az' => ['required','max:200'],
            'title3_en' => ['required','max:200'],
            'title3_ru' => ['required','max:200'],
            'description1_az' => ['required'],
            'description1_en' => ['required'],
            'description1_ru' => ['required'],
            'description2_az' => ['required'],
            'description2_en' => ['required'],
            'description2_ru' => ['required'],
            'description3_az' => ['required'],
            'description3_en' => ['required'],
            'description3_ru' => ['required'],
            'image' => ['image'],
            'alt_image_az' => ['required','max:200'],
            'alt_image_en' => ['required','max:200'],
            'alt_image_ru' => ['required','max:200']
        ]);
        $emergency = Emergency::first();
        if($request->hasFile('image')){
            $imagePath = handleUpload('image');
        }
        Emergency::updateOrCreate(
            ['id' => $id],
        [
                    'title1_az' => $request->title1_az,
                    'title1_en' => $request->title1_en,
                    'title1_ru' => $request->title1_ru,
                    'title2_az' => $request->title2_az,
                    'title2_en' => $request->title2_en,
                    'title2_ru' => $request->title2_ru,
                    'title3_az' => $request->title3_az,
                    'title3_en' => $request->title3_en,
                    'title3_ru' => $request->title3_ru,
                    'description1_az' => $request->description1_az,
                    'description1_en' => $request->description1_en,
                    'description1_ru' => $request->description1_ru,
                    'description2_az' => $request->description2_az,
                    'description2_en' => $request->description2_en,
                    'description2_ru' => $request->description2_ru,
                    'description3_az' => $request->description3_az,
                    'description3_en' => $request->description3_en,
                    'description3_ru' => $request->description3_ru,
                    'image' => (!empty($imagePath) ? $imagePath : $emergency?->image),
                    'alt_image_az' => $request->alt_image_az,
                    'alt_image_en' => $request->alt_image_en,
                    'alt_image_ru' => $request->alt_image_ru
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
