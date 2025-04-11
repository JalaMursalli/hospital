<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SeminarSeo;
use Illuminate\Http\Request;

class SeminarSeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seminar = SeminarSeo::first();
        return view('backend.seminar-seo.index',compact('seminar'));
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

            'meta_title_az'=> ['required', 'max:200'],
            'meta_title_en'=> ['required', 'max:200'],
            'meta_title_ru'=> ['required', 'max:200'],
            'meta_description_az' => ['required'],
            'meta_description_en' => ['required'],
            'meta_description_ru' => ['required'],

        ]);
        $seminar = SeminarSeo::first();
        SeminarSeo::updateOrCreate(
            ['id' => $id],
            [
                'meta_title_az' => $request->meta_title_az,
                'meta_title_en' => $request->meta_title_en,
                'meta_title_ru' => $request->meta_title_ru,
                'meta_description_az' => $request->meta_description_az,
                'meta_description_en' => $request->meta_description_en,
                'meta_description_ru' => $request->meta_description_ru,
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
