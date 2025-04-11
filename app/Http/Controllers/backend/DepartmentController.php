<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $departments = Department::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.departments.index', compact('search', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = new Department();
        $categories = ServiceCategory::all();
        return view('backend.departments.create',compact('department','categories'));
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
        $department = new Department();
        $department->icon = $iconPath;
        $department->image1 = $imagePath1;
        $department->image2 = $imagePath2;
        $department->title_az = $request->title_az;
        $department->title_en = $request->title_en;
        $department->title_ru = $request->title_ru;
        $department->slug_az = Str::slug($request->title_az);
        $department->slug_en = Str::slug($request->title_en);
        $department->slug_ru = Str::slug($request->title_ru);
        $department->description1_az = $request->description1_az;
        $department->description1_en = $request->description1_en;
        $department->description1_ru = $request->description1_ru;
        $department->description2_az = $request->description2_az;
        $department->description2_en = $request->description2_en;
        $department->description2_ru = $request->description2_ru;
        $department->meta_title_az = $request->meta_title_az;
        $department->meta_title_en = $request->meta_title_en;
        $department->meta_title_ru = $request->meta_title_ru;
        $department->meta_description_az = $request->meta_description_az;
        $department->meta_description_en = $request->meta_description_en;
        $department->meta_description_ru = $request->meta_description_ru;
        $department->alt_image1_az = $request->alt_image1_az;
        $department->alt_image1_en = $request->alt_image1_en;
        $department->alt_image1_ru = $request->alt_image1_ru;
        $department->alt_image2_az = $request->alt_image2_az;
        $department->alt_image2_en = $request->alt_image2_en;
        $department->alt_image2_ru = $request->alt_image2_ru;
        $department->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.department.index');
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
        $department = Department::findOrFail($id);
        $categories = ServiceCategory::all();
        return view('backend.departments.edit',compact('department','categories'));
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
        $department = Department::findOrFail($id);
        $department->icon = (!empty($iconPath) ? $iconPath : $department->icon);
        $department->image1 = (!empty($imagePath1) ? $imagePath1 : $department->image1);
        $department->image2 = (!empty($imagePath2) ? $imagePath2 : $department->image2);
        $department->title_az = $request->title_az;
        $department->title_en = $request->title_en;
        $department->title_ru = $request->title_ru;
        $department->slug_az = Str::slug($request->title_az);
        $department->slug_en = Str::slug($request->title_en);
        $department->slug_ru = Str::slug($request->title_ru);
        $department->description1_az = $request->description1_az;
        $department->description1_en = $request->description1_en;
        $department->description1_ru = $request->description1_ru;
        $department->description2_az = $request->description2_az;
        $department->description2_en = $request->description2_en;
        $department->description2_ru = $request->description2_ru;
        $department->meta_title_az = $request->meta_title_az;
        $department->meta_title_en = $request->meta_title_en;
        $department->meta_title_ru = $request->meta_title_ru;
        $department->meta_description_az = $request->meta_description_az;
        $department->meta_description_en = $request->meta_description_en;
        $department->meta_description_ru = $request->meta_description_ru;
        $department->alt_image1_az = $request->alt_image1_az;
        $department->alt_image1_en = $request->alt_image1_en;
        $department->alt_image1_ru = $request->alt_image1_ru;
        $department->alt_image2_az = $request->alt_image2_az;
        $department->alt_image2_en = $request->alt_image2_en;
        $department->alt_image2_ru = $request->alt_image2_ru;
        $department->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        deleteFileIfExist($department->icon);
        deleteFileIfExist($department->image1);
        deleteFileIfExist($department->image2);
        $department->delete();
        return redirect()->route('backend.department.index')->with('success', 'Uğurla silindi!');

    }
}
