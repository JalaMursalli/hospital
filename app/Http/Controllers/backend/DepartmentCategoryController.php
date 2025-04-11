<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DepartmentCategory;
use Illuminate\Http\Request;

class DepartmentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = DepartmentCategory::paginate(10);
        $search = $request->input('search');

        $categories = DepartmentCategory::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.department-category.index', compact('categories', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new DepartmentCategory();
        return view('backend.department-category.create',compact('category'));
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
        ]);
        $category = new DepartmentCategory();
        $category->title_az = $request->title_az;
        $category->title_en = $request->title_en;
        $category->title_ru = $request->title_ru;
        $category->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.department-category.index');
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
        $category = DepartmentCategory::findOrFail($id);
        return view('backend.department-category.edit',compact('category'));
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
        ]);

        $category = DepartmentCategory::findOrFail($id);
        $category->title_az = $request->title_az;
        $category->title_en = $request->title_en;
        $category->title_ru = $request->title_ru;
        $category->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.department-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = DepartmentCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('backend.department-category.index')->with('success', 'Uğurla silindi!');
    }
}
