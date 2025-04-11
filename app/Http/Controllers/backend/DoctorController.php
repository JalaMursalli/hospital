<?php

namespace App\Http\Controllers\Backend;

use App\Models\Department;
use App\Models\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $doctors = Doctor::when($search, function ($query, $search) {
            return $query->where('name_az', 'like', "%{$search}%")
            ->orWhere('name_en', 'like', "%{$search}%")
            ->orWhere('name_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.doctors.index', compact('search', 'doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctor = new Doctor();
        $departments = Department::all();
        return view('backend.doctors.create',compact('doctor','departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required','image'],
            'name_az' => ['required', 'max:200'],
            'name_en' => ['required', 'max:200'],
            'name_ru' => ['required', 'max:200'],
            'position_az' => ['required', 'max:200'],
            'position_en' => ['required', 'max:200'],
            'position_ru' => ['required', 'max:200'],
            'description_az' => ['required'],
            'description_en' => ['required'],
            'description_ru' => ['required'],
            'department_id'=>['nullable','integer','exists:departments,id'],
            'meta_title_az'=> ['required', 'max:200'],
            'meta_title_en'=> ['required', 'max:200'],
            'meta_title_ru'=> ['required', 'max:200'],
            'meta_description_az' => ['required'],
            'meta_description_en' => ['required'],
            'meta_description_ru' => ['required'],
            'alt_image_az' => ['required','max:200'],
            'alt_image_en' => ['required','max:200'],
            'alt_image_ru' => ['required','max:200']
        ]);
        $imagePath = handleUpload('image');
        $doctor = new Doctor();
        $doctor->image = $imagePath;
        $doctor->name_az = $request->name_az;
        $doctor->name_en = $request->name_en;
        $doctor->name_ru = $request->name_ru;
        $doctor->slug_az = Str::slug($request->name_az);
        $doctor->slug_en = Str::slug($request->name_en);
        $doctor->slug_ru = Str::slug($request->name_ru);
        $doctor->position_az = $request->position_az;
        $doctor->position_en = $request->position_en;
        $doctor->position_ru = $request->position_ru;
        $doctor->description_az = $request->description_az;
        $doctor->description_en = $request->description_en;
        $doctor->description_ru = $request->description_ru;
        $doctor->department_id = $request->department_id;
        $doctor->meta_title_az = $request->meta_title_az;
        $doctor->meta_title_en = $request->meta_title_en;
        $doctor->meta_title_ru = $request->meta_title_ru;
        $doctor->meta_description_az = $request->meta_description_az;
        $doctor->meta_description_en = $request->meta_description_en;
        $doctor->meta_description_ru = $request->meta_description_ru;
        $doctor->alt_image_az = $request->alt_image_az;
        $doctor->alt_image_en = $request->alt_image_en;
        $doctor->alt_image_ru = $request->alt_image_ru;
        $doctor->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.doctor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $departments = Department::all();
        return view('backend.doctors.edit',compact('doctor','departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['image'],
            'name_az' => ['required', 'max:200'],
            'name_en' => ['required', 'max:200'],
            'name_ru' => ['required', 'max:200'],
            'position_az' => ['required', 'max:200'],
            'position_en' => ['required', 'max:200'],
            'position_ru' => ['required', 'max:200'],
            'description_az' => ['required'],
            'description_en' => ['required'],
            'description_ru' => ['required'],
            'department_id'=>['nullable','integer','exists:departments,id'],
            'meta_title_az'=> ['required', 'max:200'],
            'meta_title_en'=> ['required', 'max:200'],
            'meta_title_ru'=> ['required', 'max:200'],
            'meta_description_az' => ['required'],
            'meta_description_en' => ['required'],
            'meta_description_ru' => ['required'],
            'alt_image_az' => ['required','max:200'],
            'alt_image_en' => ['required','max:200'],
            'alt_image_ru' => ['required','max:200']
        ]);
        $imagePath = handleUpload('image');
        $doctor = Doctor::findOrFail($id);
        $doctor->image = (!empty($imagePath) ? $imagePath : $doctor->image);
        $doctor->name_az = $request->name_az;
        $doctor->name_en = $request->name_en;
        $doctor->name_ru = $request->name_ru;
        $doctor->slug_az = Str::slug($request->name_az);
        $doctor->slug_en = Str::slug($request->name_en);
        $doctor->slug_ru = Str::slug($request->name_ru);
        $doctor->position_az = $request->position_az;
        $doctor->position_en = $request->position_en;
        $doctor->position_ru = $request->position_ru;
        $doctor->description_az = $request->description_az;
        $doctor->description_en = $request->description_en;
        $doctor->description_ru = $request->description_ru;
        $doctor->department_id = $request->department_id;
        $doctor->meta_title_az = $request->meta_title_az;
        $doctor->meta_title_en = $request->meta_title_en;
        $doctor->meta_title_ru = $request->meta_title_ru;
        $doctor->meta_description_az = $request->meta_description_az;
        $doctor->meta_description_en = $request->meta_description_en;
        $doctor->meta_description_ru = $request->meta_description_ru;
        $doctor->alt_image_az = $request->alt_image_az;
        $doctor->alt_image_en = $request->alt_image_en;
        $doctor->alt_image_ru = $request->alt_image_ru;
        $doctor->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        deleteFileIfExist(filePath: $doctor->image);
        $doctor->delete();
        return redirect()->route('backend.doctor.index')->with('success', 'Uğurla silindi!');
    }
}
