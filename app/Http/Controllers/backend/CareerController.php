<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $careers = Career::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");
        })->paginate(10);

        return view('backend.careers.index', compact('search', 'careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $career = new Career();
        $vacancies = Vacancy::all();
        return view('backend.careers.create',compact('career','vacancies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'title_az' => ['required','max:200'],
            'title_en' => ['required','max:200'],
            'title_ru' => ['required','max:200'],
            'address_az' => ['required','max:200'],
            'address_en' => ['required','max:200'],
            'address_ru' => ['required','max:200'],
            'workHours' => ['required','max:200'],
            'workSchedule_az' => ['required'],
            'workSchedule_en' => ['required'],
            'workSchedule_ru' => ['required'],
            'salary_az' => ['required'],
            'salary_en' => ['required'],
            'salary_ru' => ['required'],
            'image' => ['required','image'],
            'status' => ['required'],
            'description1_az' => ['nullable'],
            'description1_en' => ['nullable'],
            'description1_ru' => ['nullable'],
            'description2_az' => ['nullable'],
            'description2_en' => ['nullable'],
            'description2_ru' => ['nullable'],
            'description3_az' => ['nullable'],
            'description3_en' => ['nullable'],
            'description3_ru' => ['nullable'],
            'meta_title_az'=> ['required', 'max:200'],
            'meta_title_en'=> ['required', 'max:200'],
            'meta_title_ru'=> ['required', 'max:200'],
            'meta_description_az' => ['required'],
            'meta_description_en' => ['required'],
            'meta_description_ru' => ['required'],
            'alt_image_az' => ['required','max:200'],
            'alt_image_en' => ['required','max:200'],
            'alt_image_ru' => ['required','max:200'],
            'vacancy_id' => ['required','integer']

       ]);
       $imagePath = handleUpload('image');
       $career = new Career();
       $career->title_az = $request->title_az;
       $career->title_en = $request->title_en;
       $career->title_ru = $request->title_ru;
       $career->slug_az = Str::slug($request->title_az);
       $career->slug_en = Str::slug($request->title_en);
       $career->slug_ru = Str::slug($request->title_ru);
       $career->address_az = $request->address_az;
       $career->address_en = $request->address_en;
       $career->address_ru = $request->address_ru;
       $career->workHours = $request->workHours;
       $career->workSchedule_az = $request->workSchedule_az;
       $career->workSchedule_en = $request->workSchedule_en;
       $career->workSchedule_ru = $request->workSchedule_ru;
       $career->salary_az = $request->salary_az;
       $career->salary_en = $request->salary_en;
       $career->salary_ru = $request->salary_ru;
       $career->image = $imagePath;
       $career->status = $request->status;
       $career->description1_az = $request->description1_az;
       $career->description1_en = $request->description1_en;
       $career->description1_ru = $request->description1_ru;
       $career->description2_az = $request->description2_az;
       $career->description2_en = $request->description2_en;
       $career->description2_ru = $request->description2_ru;
       $career->description3_az = $request->description3_az;
       $career->description3_en = $request->description3_en;
       $career->description3_ru = $request->description3_ru;
       $career->meta_title_az = $request->meta_title_az;
       $career->meta_title_en = $request->meta_title_en;
       $career->meta_title_ru = $request->meta_title_ru;
       $career->meta_description_az = $request->meta_description_az;
       $career->meta_description_en = $request->meta_description_en;
       $career->meta_description_ru = $request->meta_description_ru;
       $career->alt_image_az = $request->alt_image_az;
       $career->alt_image_en = $request->alt_image_en;
       $career->alt_image_ru = $request->alt_image_ru;
       $career->vacancy_id = $request->vacancy_id;
       $career->save();
       toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.career.index');

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
        $career = Career::findOrFail($id);
        $vacancies = Vacancy::all();
        return view('backend.careers.edit',compact('career','vacancies'));
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
            'address_az' => ['required','max:200'],
            'address_en' => ['required','max:200'],
            'address_ru' => ['required','max:200'],
            'workHours' => ['required','max:200'],
            'workSchedule_az' => ['required'],
            'workSchedule_en' => ['required'],
            'workSchedule_ru' => ['required'],
            'salary_az' => ['required'],
            'salary_en' => ['required'],
            'salary_ru' => ['required'],
            'image' => ['image'],
            'status' => ['required'],
            'description1_az' => ['nullable'],
            'description1_en' => ['nullable'],
            'description1_ru' => ['nullable'],
            'description2_az' => ['nullable'],
            'description2_en' => ['nullable'],
            'description2_ru' => ['nullable'],
            'description3_az' => ['nullable'],
            'description3_en' => ['nullable'],
            'description3_ru' => ['nullable'],
            'meta_title_az'=> ['required', 'max:200'],
            'meta_title_en'=> ['required', 'max:200'],
            'meta_title_ru'=> ['required', 'max:200'],
            'meta_description_az' => ['required'],
            'meta_description_en' => ['required'],
            'meta_description_ru' => ['required'],
            'alt_image_az' => ['required','max:200'],
            'alt_image_en' => ['required','max:200'],
            'alt_image_ru' => ['required','max:200'],
            'vacancy_id' => ['required','integer']

       ]);
       $imagePath = handleUpload('image');
       $career = Career::findOrFail($id);
       $career->title_az = $request->title_az;
       $career->title_en = $request->title_en;
       $career->title_ru = $request->title_ru;
       $career->slug_az = Str::slug($request->title_az);
       $career->slug_en = Str::slug($request->title_en);
       $career->slug_ru = Str::slug($request->title_ru);
       $career->address_az = $request->address_az;
       $career->address_en = $request->address_en;
       $career->address_ru = $request->address_ru;
       $career->workHours = $request->workHours;
       $career->workSchedule_az = $request->workSchedule_az;
       $career->workSchedule_en = $request->workSchedule_en;
       $career->workSchedule_ru = $request->workSchedule_ru;
       $career->salary_az = $request->salary_az;
       $career->salary_en = $request->salary_en;
       $career->salary_ru = $request->salary_ru;
       $career->image = (!empty($imagePath) ? $imagePath : $career->image);
       $career->status = $request->status;
       $career->description1_az = $request->description1_az;
       $career->description1_en = $request->description1_en;
       $career->description1_ru = $request->description1_ru;
       $career->description2_az = $request->description2_az;
       $career->description2_en = $request->description2_en;
       $career->description2_ru = $request->description2_ru;
       $career->description3_az = $request->description3_az;
       $career->description3_en = $request->description3_en;
       $career->description3_ru = $request->description3_ru;
       $career->meta_title_az = $request->meta_title_az;
       $career->meta_title_en = $request->meta_title_en;
       $career->meta_title_ru = $request->meta_title_ru;
       $career->meta_description_az = $request->meta_description_az;
       $career->meta_description_en = $request->meta_description_en;
       $career->meta_description_ru = $request->meta_description_ru;
       $career->alt_image_az = $request->alt_image_az;
       $career->alt_image_en = $request->alt_image_en;
       $career->alt_image_ru = $request->alt_image_ru;
       $career->vacancy_id = $request->vacancy_id;
       $career->save();
       toastr()->success('Uğurla yaradıldı');
       return redirect()->route('backend.career.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $career = Career::findOrFail($id);
        deleteFileIfExist($career->image);
        $career->delete();
        return redirect()->route('backend.career.index')->with('success', 'Uğurla silindi!');
    }
   
}
