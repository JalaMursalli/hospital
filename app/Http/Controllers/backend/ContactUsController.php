<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactUs = ContactUs::first();
        return view('backend.contact-us.index',compact('contactUs'));
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
            'sub_title_az' => ['required','max:200'],
            'sub_title_en' => ['required','max:200'],
            'sub_title_ru' => ['required','max:200'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'image' => ['image'],
            'alt_image_az' => ['required','max:200'],
            'alt_image_en' => ['required','max:200'],
            'alt_image_ru' => ['required','max:200']
        ]);
        $contactUs = ContactUs::first();
        if($request->hasFile('image')){
            $imagePath = handleUpload('image');
        }
        ContactUs::updateOrCreate(
            ['id' => $id],
            [
                'title_az' => $request->title_az,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru,
                'sub_title_az' => $request->sub_title_az,
                'sub_title_en' => $request->sub_title_en,
                'sub_title_ru' => $request->sub_title_ru,
                'description_az' => $request->description_az,
                'description_en' => $request->description_en,
                'description_ru' => $request->description_ru,
                'image' => (!empty($imagePath)? $imagePath :$contactUs?->image),
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
