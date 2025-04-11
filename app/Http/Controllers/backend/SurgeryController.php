<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurgeryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $surgeries= Surgery::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.surgery.index', compact('search', 'surgeries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $surgery = new Surgery();
        // $categories = ServiceCategory::all();
        return view('backend.surgery.create',compact('surgery'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required','image'],
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'description1_az' => ['nullable'],
            'description1_en' => ['nullable'],
            'description1_ru' => ['nullable'],
            'description2_az' => ['nullable'],
            'description2_en' => ['nullable'],
            'description2_ru' => ['nullable'],
            'image1' => ['required','image'],
            'image2' => ['required','image'],
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
        $iconPath = handleUpload('icon');
        $imagePath1 = handleUpload('image1');
        $imagePath2 = handleUpload('image2');
        $surgery = new Surgery();
        $surgery->icon = $iconPath;
        $surgery->image1 = $imagePath1;
        $surgery->image2 = $imagePath2;
        $surgery->title_az = $request->title_az;
        $surgery->title_en = $request->title_en;
        $surgery->title_ru = $request->title_ru;
        $surgery->slug_az = Str::slug($request->title_az);
        $surgery->slug_en = Str::slug($request->title_en);
        $surgery->slug_ru = Str::slug($request->title_ru);
        $surgery->description1_az = $request->description1_az;
        $surgery->description1_en = $request->description1_en;
        $surgery->description1_ru = $request->description1_ru;
        $surgery->description2_az = $request->description2_az;
        $surgery->description2_en = $request->description2_en;
        $surgery->description2_ru = $request->description2_ru;
        $surgery->meta_title_az = $request->meta_title_az;
        $surgery->meta_title_en = $request->meta_title_en;
        $surgery->meta_title_ru = $request->meta_title_ru;
        $surgery->meta_description_az = $request->meta_description_az;
        $surgery->meta_description_en = $request->meta_description_en;
        $surgery->meta_description_ru = $request->meta_description_ru;
        $surgery->alt_image1_az = $request->alt_image1_az;
        $surgery->alt_image1_en = $request->alt_image1_en;
        $surgery->alt_image1_ru = $request->alt_image1_ru;
        $surgery->alt_image2_az = $request->alt_image2_az;
        $surgery->alt_image2_en = $request->alt_image2_en;
        $surgery->alt_image2_ru = $request->alt_image2_ru;
        $surgery->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.surgery.index');
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
        $surgery = Surgery::findOrFail($id);
        // $categories = ServiceCategory::all();
        return view('backend.surgery.edit',compact('surgery',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['image'],
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'description1_az' => ['nullable'],
            'description1_en' => ['nullable'],
            'description1_ru' => ['nullable'],
            'description2_az' => ['nullable'],
            'description2_en' => ['nullable'],
            'description2_ru' => ['nullable'],
            'image1' => ['image'],
            'image2' => ['image'],
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
        $iconPath = handleUpload('icon');
        $imagePath1 = handleUpload('image1');
        $imagePath2 = handleUpload('image2');
        $surgery = Surgery::findOrFail($id);
        $surgery->icon = (!empty($iconPath) ? $iconPath : $surgery->icon);
        $surgery->image1 = (!empty($imagePath1) ? $imagePath1 : $surgery->image1);
        $surgery->image2 = (!empty($imagePath2) ? $imagePath2 : $surgery->image2);
        $surgery->title_az = $request->title_az;
        $surgery->title_en = $request->title_en;
        $surgery->title_ru = $request->title_ru;
        $surgery->slug_az = Str::slug($request->title_az);
        $surgery->slug_en = Str::slug($request->title_en);
        $surgery->slug_ru = Str::slug($request->title_ru);
        $surgery->description1_az = $request->description1_az;
        $surgery->description1_en = $request->description1_en;
        $surgery->description1_ru = $request->description1_ru;
        $surgery->description2_az = $request->description2_az;
        $surgery->description2_en = $request->description2_en;
        $surgery->description2_ru = $request->description2_ru;
        $surgery->meta_title_az = $request->meta_title_az;
        $surgery->meta_title_en = $request->meta_title_en;
        $surgery->meta_title_ru = $request->meta_title_ru;
        $surgery->meta_description_az = $request->meta_description_az;
        $surgery->meta_description_en = $request->meta_description_en;
        $surgery->meta_description_ru = $request->meta_description_ru;
        $surgery->alt_image1_az = $request->alt_image1_az;
        $surgery->alt_image1_en = $request->alt_image1_en;
        $surgery->alt_image1_ru = $request->alt_image1_ru;
        $surgery->alt_image2_az = $request->alt_image2_az;
        $surgery->alt_image2_en = $request->alt_image2_en;
        $surgery->alt_image2_ru = $request->alt_image2_ru;
        $surgery->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.surgery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surgery = Surgery::findOrFail($id);
        deleteFileIfExist($surgery->icon);
        deleteFileIfExist($surgery->image1);
        deleteFileIfExist($surgery->image2);
        $surgery->delete();
        return redirect()->route('backend.surgery.index')->with('success', 'Uğurla silindi!');
    }
}
