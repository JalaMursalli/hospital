<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('backend.about-us.index',compact('aboutUs'));
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
        try{
            $request->validate([
                'title_az' => ['required','max:200'],
                'title_en' => ['required','max:200'],
                'title_ru' => ['required','max:200'],
                'description_az' => ['nullable'],
                'description_en' => ['nullable'],
                'description_ru' => ['nullable'],
                'image' => ['nullable','image'],
                'alt_image_az' => ['required','max:200'],
                'alt_image_en' => ['required','max:200'],
                'alt_image_ru' => ['required','max:200']
            ]);
            $about = AboutUs::findOrFail($id);
            if($request->hasFile('image')){
                $imagePath = handleUpload('image');
            }
            $about->updateOrCreate(
                ['id' => $id],
                [
                    'title_az' => $request->title_az,
                    'title_en' => $request->title_en,
                    'title_ru' => $request->title_ru,
                    'description_az' => $request->description_az,
                    'description_en' => $request->description_en,
                    'description_ru' => $request->description_ru,
                    'image' => (!empty($imagePath)? $imagePath :$about?->image),
                    'alt_image_az' => $request->alt_image_az,
                    'alt_image_en' => $request->alt_image_en,
                    'alt_image_ru' => $request->alt_image_ru

                ]
            );
            toastr()->success('Uğurla yeniləndi', 'Congrats');
            return redirect()->back();
        }catch(\Exception $ex){
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
