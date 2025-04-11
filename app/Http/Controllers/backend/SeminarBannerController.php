<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SeminarBanner;
use Illuminate\Http\Request;

class SeminarBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seminar = SeminarBanner::first();
        return view('backend.seminar-banner.index',compact('seminar'));
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
            'image' =>['nullable','image']
         ]);
         $seminar = SeminarBanner::first();
         if($request->hasFile('image')){
            $imagePath = handleUpload('image');
        }
         SeminarBanner::updateOrCreate(
            ['id' => $id],
                [
                    'title_az' => $request->title_az,
                    'title_en' => $request->title_en,
                    'title_ru' => $request->title_ru,
                    'image' => (!empty($imagePath) ? $imagePath : $seminar->image)
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
