<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('service_category_id');
        $services = Service::when($search, function($query, $search){
            return $query->where('title_az','like',"%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })
        ->when($categoryId, function ($query, $categoryId) {
            return $query->where('service_category_id', $categoryId);
        })
        ->paginate(10);
        $categories = ServiceCategory::all();
        return view('backend.services.index',compact('search','categoryId','services','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = new Service();
        $categories = ServiceCategory::all();
        return view('backend.services.create',compact('service','categories'));
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
            'price' => ['required','numeric'],
            'service_category_id' => ['required','integer','exists:service_categories,id']
        ]);
        $service = new Service();
        $service->title_az = $request->title_az;
        $service->title_en = $request->title_en;
        $service->title_ru = $request->title_ru;
        $service->price = $request->price;
        $service->service_category_id = $request->service_category_id;
        $service->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.service.index');
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
        $service = Service::findOrFail($id);
        $categories = ServiceCategory::all();
        return view('backend.services.edit',compact('service','categories'));
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
            'price' => ['required','numeric'],
            'service_category_id' => ['required','integer','exists:service_categories,id']
        ]);
        $service = Service::findOrFail($id);
        $service->title_az = $request->title_az;
        $service->title_en = $request->title_en;
        $service->title_ru = $request->title_ru;
        $service->price = $request->price;
        $service->service_category_id = $request->service_category_id;
        $service->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('backend.service.index')->with('success', 'Uğurla silindi!');
    }
}
