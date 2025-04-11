<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vacancies = Vacancy::paginate(10);
        $search = $request->input('search');

        $vacancies =Vacancy::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.vacancies.index', compact('vacancies', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vacancy = new Vacancy();
        return view('backend.vacancies.create',compact('vacancy'));
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
        $vacancy = new Vacancy();
        $vacancy->title_az = $request->title_az;
        $vacancy->title_en = $request->title_en;
        $vacancy->title_ru = $request->title_ru;
        $vacancy->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.vacancy.index');
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
        $vacancy = Vacancy::findOrFail($id);
        return view('backend.vacancies.edit',compact('vacancy'));
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
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->title_az = $request->title_az;
        $vacancy->title_en = $request->title_en;
        $vacancy->title_ru = $request->title_ru;
        $vacancy->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.vacancy.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();
        return redirect()->route('backend.vacancy.index')->with('success', 'Uğurla silindi!');
    }
}
