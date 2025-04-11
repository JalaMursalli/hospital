<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Checkup;
use Illuminate\Http\Middleware\CheckResponseForModifications;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $checkups = Checkup::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.check-up.index', compact('search', 'checkups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $checkup = new Checkup();
        return view('backend.check-up.create',compact('checkup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image1' => ['required','image'],
            'image2' => ['required','image'],
            'title_az' => ['required','max:200'],
            'title_en' => ['required','max:200'],
            'title_ru' => ['required','max:200'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'price' => ['required','numeric'],
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
            'alt_image2_ru' => ['required','max:200'],
            'discounted_price' => ['nullable','numeric'],
        ]);
        $imagePath1 = handleUpload('image1');
        $imagePath2 = handleUpload('image2');
        $checkup = new Checkup();
        $checkup->image1 = $imagePath1;
        $checkup->image2 = $imagePath2;
        $checkup->title_az = $request->title_az;
        $checkup->title_en = $request->title_en;
        $checkup->title_ru = $request->title_ru;
        $checkup->slug_az = Str::slug($request->title_az);
        $checkup->slug_en = Str::slug($request->title_en);
        $checkup->slug_ru = Str::slug($request->title_ru);
        $checkup->description_az = $request->description_az;
        $checkup->description_en = $request->description_en;
        $checkup->description_ru = $request->description_ru;
        $checkup->price = $request->price;
        $checkup->meta_title_az = $request->meta_title_az;
        $checkup->meta_title_en = $request->meta_title_en;
        $checkup->meta_title_ru = $request->meta_title_ru;
        $checkup->meta_description_az = $request->meta_description_az;
        $checkup->meta_description_en = $request->meta_description_en;
        $checkup->meta_description_ru = $request->meta_description_ru;
        $checkup->alt_image1_az = $request->alt_image1_az;
        $checkup->alt_image1_en = $request->alt_image1_en;
        $checkup->alt_image1_ru = $request->alt_image1_ru;
        $checkup->alt_image2_az = $request->alt_image2_az;
        $checkup->alt_image2_en = $request->alt_image2_en;
        $checkup->alt_image2_ru = $request->alt_image2_ru;
        $checkup->discounted_price = $request->discounted_price;
        $checkup->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.checkup.index');

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
        $checkup = Checkup::findOrFail($id);
        return view('backend.check-up.edit',compact('checkup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image1' => ['image'],
            'image2' => ['image'],
            'title_az' => ['required','max:200'],
            'title_en' => ['required','max:200'],
            'title_ru' => ['required','max:200'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'price' => ['required','integer'],
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
            'alt_image2_ru' => ['required','max:200'],
            'discounted_price' => ['nullable','numeric'],
        ]);
        $imagePath1 = handleUpload('image1');
        $imagePath2 = handleUpload('image2');
        $checkup = Checkup::findOrFail($id);
        $checkup->image1 = (!empty($imagePath1) ? $imagePath1 : $checkup->image1);
        $checkup->image2 = (!empty($imagePath2) ? $imagePath2 : $checkup->image2);
        $checkup->title_az = $request->title_az;
        $checkup->title_en = $request->title_en;
        $checkup->title_ru = $request->title_ru;
        $checkup->slug_az = Str::slug($request->title_az);
        $checkup->slug_en = Str::slug($request->title_en);
        $checkup->slug_ru = Str::slug($request->title_ru);
        $checkup->description_az = $request->description_az;
        $checkup->description_en = $request->description_en;
        $checkup->description_ru = $request->description_ru;
        $checkup->price = $request->price;
        $checkup->meta_title_az = $request->meta_title_az;
        $checkup->meta_title_en = $request->meta_title_en;
        $checkup->meta_title_ru = $request->meta_title_ru;
        $checkup->meta_description_az = $request->meta_description_az;
        $checkup->meta_description_en = $request->meta_description_en;
        $checkup->meta_description_ru = $request->meta_description_ru;
        $checkup->alt_image1_az = $request->alt_image1_az;
        $checkup->alt_image1_en = $request->alt_image1_en;
        $checkup->alt_image1_ru = $request->alt_image1_ru;
        $checkup->alt_image2_az = $request->alt_image2_az;
        $checkup->alt_image2_en = $request->alt_image2_en;
        $checkup->alt_image2_ru = $request->alt_image2_ru;
        $checkup->discounted_price = $request->discounted_price;
        $checkup->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.checkup.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $checkup = Checkup::findOrFail($id);
        deleteFileIfExist($checkup->image1);
        deleteFileIfExist($checkup->image2);
        $checkup->delete();
        return redirect()->route('backend.checkup.index')->with('success', 'Uğurla silindi!');
    }
}
