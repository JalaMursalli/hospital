<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $advantages = Advantage::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.advantages.index', compact('search', 'advantages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $advantage = new Advantage();
        return view('backend.advantages.create',compact('advantage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'image' => ['required','image'],
        'title_az' => ['required','max:100'],
        'title_en' => ['required','max:100'],
        'title_ru' => ['required','max:100'],
        'sub_title_az' => ['required','max:200'],
        'sub_title_en' => ['required','max:200'],
        'sub_title_ru' => ['required','max:200'],
        ]);
        $imagePath = handleUpload('image');
        $advantage = new Advantage();
        $advantage->image = $imagePath;
        $advantage->title_az = $request->title_az;
        $advantage->title_en = $request->title_en;
        $advantage->title_ru = $request->title_ru;
        $advantage->sub_title_az = $request->sub_title_az;
        $advantage->sub_title_en = $request->sub_title_en;
        $advantage->sub_title_ru = $request->sub_title_ru;
        $advantage->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.advantage.index');
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
        $advantage = Advantage::findOrFail($id);
        return view('backend.advantages.edit',compact('advantage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['image'],
            'title_az' => ['required','max:100'],
            'title_en' => ['required','max:100'],
            'title_ru' => ['required','max:100'],
            'sub_title_az' => ['required','max:200'],
            'sub_title_en' => ['required','max:200'],
            'sub_title_ru' => ['required','max:200'],
            ]);
            $imagePath = handleUpload('image');
            $advantage = Advantage::findOrFail($id);
            $advantage->image = (!empty($imagePath)? $imagePath : $advantage->image );
            $advantage->title_az = $request->title_az;
            $advantage->title_en = $request->title_en;
            $advantage->title_ru = $request->title_ru;
            $advantage->sub_title_az = $request->sub_title_az;
            $advantage->sub_title_en = $request->sub_title_en;
            $advantage->sub_title_ru = $request->sub_title_ru;
            $advantage->save();
            toastr()->success('Uğurla yeniləndi');
            return redirect()->route('backend.advantage.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advantage = Advantage::findOrFail($id);
        deleteFileIfExist(filePath: $advantage->image);
        $advantage->delete();
        return redirect()->route('backend.advantage.index')->with('success', 'Uğurla silindi!');

    }
}
