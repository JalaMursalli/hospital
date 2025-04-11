<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $seminars = Seminar::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.seminars.index', compact('search', 'seminars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seminar = new Seminar();
        return view('backend.seminars.create',compact('seminar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'image1' => ['required','image'],
                'image2' => ['required','image'],
                'title_az' => ['required', 'max:200'],
                'title_en' => ['required', 'max:200'],
                'title_ru' => ['required', 'max:200'],
                'sub_title_az' => ['required', 'max:200'],
                'sub_title_en' => ['required', 'max:200'],
                'sub_title_ru' => ['required', 'max:200'],
                'description_az' => ['nullable'],
                'description_en' => ['nullable'],
                'description_ru' => ['nullable'],
                'date' => ['required','date'],
                'countView' => ['required','integer'],
                'type' => ['required','integer','max:3'],
                'priceStatus' => ['required','integer','max:3'],
                'meta_title_az'=> ['required', 'max:200'],
                'meta_title_en'=> ['required', 'max:200'],
                'meta_title_ru'=> ['required', 'max:200'],
                'meta_description_az' => ['required'],
                'meta_description_en' => ['required'],
                'meta_description_ru' => ['required'],
                'alt_image1_az' => ['required','max:200'],
                'alt_image1_en' => ['required','max:200'],
                'alt_image1_ru' => ['required','max:200'],
                'alt_image2_az' => ['required','max:200'],
                'alt_image2_en' => ['required','max:200'],
                'alt_image2_ru' => ['required','max:200']

            ]);
            $imagePath1 = handleUpload('image1');
            $imagePath2 = handleUpload('image2');
            $seminar = new Seminar();
            $seminar->image1 =  $imagePath1;
            $seminar->image2 =  $imagePath2;
            $seminar->type = $request->type;
            $seminar->title_az = $request->title_az;
            $seminar->title_en = $request->title_en;
            $seminar->title_ru = $request->title_ru;
            $seminar->sub_title_az = $request->sub_title_az;
            $seminar->sub_title_en = $request->sub_title_en;
            $seminar->sub_title_ru = $request->sub_title_ru;
            $seminar->slug_az = Str::slug($request->sub_title_az);
            $seminar->slug_en = Str::slug($request->sub_title_en);
            $seminar->slug_ru = Str::slug($request->sub_title_ru);
            $seminar->description_az = $request->description_az;
            $seminar->description_en = $request->description_en;
            $seminar->description_ru = $request->description_ru;
            $seminar->date = $request->date;
            $seminar->countView = $request->countView;
            $seminar->priceStatus = $request->priceStatus;
            $seminar->meta_title_az = $request->meta_title_az;
            $seminar->meta_title_en = $request->meta_title_en;
            $seminar->meta_title_ru = $request->meta_title_ru;
            $seminar->meta_description_az = $request->meta_description_az;
            $seminar->meta_description_en = $request->meta_description_en;
            $seminar->meta_description_ru = $request->meta_description_ru;
            $seminar->alt_image1_az = $request->alt_image1_az;
            $seminar->alt_image1_en = $request->alt_image1_en;
            $seminar->alt_image1_ru = $request->alt_image1_ru;
            $seminar->alt_image2_az = $request->alt_image2_az;
            $seminar->alt_image2_en = $request->alt_image2_en;
            $seminar->alt_image2_ru = $request->alt_image2_ru;
            $seminar->save();
            toastr()->success('Uğurla yaradıldı');
            return redirect()->route('backend.seminar.index');
        }catch(\Exception $exception){
            return $exception->getMessage();
        }

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
        $seminar = Seminar::findOrFail($id);
        return view('backend.seminars.edit', compact('seminar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      try{
        $request->validate([
            'image1' => ['image'],
            'image2' => ['image'],
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'sub_title_az' => ['required', 'max:200'],
            'sub_title_en' => ['required', 'max:200'],
            'sub_title_ru' => ['required', 'max:200'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'type' => ['required','integer','max:3'],
            'date' => ['required','date'],
            'countView' => ['required','integer'],
            'priceStatus' => ['integer'],
            'meta_title_az'=> ['required', 'max:200'],
            'meta_title_en'=> ['required', 'max:200'],
            'meta_title_ru'=> ['required', 'max:200'],
            'meta_description_az' => ['required'],
            'meta_description_en' => ['required'],
            'meta_description_ru' => ['required'],
            'alt_image1_az' => ['required','max:200'],
            'alt_image1_en' => ['required','max:200'],
            'alt_image1_ru' => ['required','max:200'],
            'alt_image2_az' => ['required','max:200'],
            'alt_image2_en' => ['required','max:200'],
            'alt_image2_ru' => ['required','max:200']

        ]);
        $imagePath1 = handleUpload('image1');
        $imagePath2 = handleUpload('image2');
        $seminar = Seminar::findOrFail($id);
        $seminar->image1 = (!empty($imagePath1) ? $imagePath1 : $seminar->image1);
        $seminar->image2 = (!empty($imagePath2) ? $imagePath2 : $seminar->image2);
        $seminar->type = $request->type;
        $seminar->title_az = $request->title_az;
        $seminar->title_en = $request->title_en;
        $seminar->title_ru = $request->title_ru;
        $seminar->sub_title_az = $request->sub_title_az;
        $seminar->sub_title_en = $request->sub_title_en;
        $seminar->sub_title_ru = $request->sub_title_ru;
        $seminar->slug_az = Str::slug($request->sub_title_az);
        $seminar->slug_en = Str::slug($request->sub_title_en);
        $seminar->slug_ru = Str::slug($request->sub_title_ru);
        $seminar->description_az = $request->description_az;
        $seminar->description_en = $request->description_en;
        $seminar->description_ru = $request->description_ru;
        $seminar->date = $request->date;
        $seminar->countView = $request->countView;
        $seminar->priceStatus = $request->priceStatus;
        $seminar->meta_title_az = $request->meta_title_az;
        $seminar->meta_title_en = $request->meta_title_en;
        $seminar->meta_title_ru = $request->meta_title_ru;
        $seminar->meta_description_az = $request->meta_description_az;
        $seminar->meta_description_en = $request->meta_description_en;
        $seminar->meta_description_ru = $request->meta_description_ru;
        $seminar->alt_image1_az = $request->alt_image1_az;
        $seminar->alt_image1_en = $request->alt_image1_en;
        $seminar->alt_image1_ru = $request->alt_image1_ru;
        $seminar->alt_image2_az = $request->alt_image2_az;
        $seminar->alt_image2_en = $request->alt_image2_en;
        $seminar->alt_image2_ru = $request->alt_image2_ru;
        $seminar->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.seminar.index');
      }
      catch(\Exception $exception){
        return $exception->getMessage();
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seminar = Seminar::findOrFail($id);
        deleteFileIfExist($seminar->image1);
        deleteFileIfExist($seminar->image2);
        $seminar->delete();
        return redirect()->route('backend.seminar.index')->with('success', 'Uğurla silindi!');
    }

    public function changePrice(){

    }
}
