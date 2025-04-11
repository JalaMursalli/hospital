<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DoctorSocial;
use Illuminate\Http\Request;

class DoctorSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $doctor_id = $request->get('doctor_id');
        $socials =DoctorSocial::when($search, function ($query, $search) {
            return $query->where('url', 'like', "%{$search}%");
        })->where('doctor_id',$doctor_id)->paginate(10);

        return view('backend.doctor-social.index', compact('search', 'socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $social = new DoctorSocial();
        return view('backend.doctor-social.create',compact('social'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id'=>['required','integer','exists:doctors,id'],
            'icon' => ['required','image'],
            'url' => ['required','url']
        ]);
        $iconPath = handleUpload('icon');
        $social = new DoctorSocial();
        $social->doctor_id = $request->doctor_id;
        $social->icon = $iconPath;
        $social->url = $request->url;
        $social->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.doctor-social.index',['doctor_id' => $request->doctor_id]);
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
        $social = DoctorSocial::findOrFail($id);
        return view('backend.doctor-social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['image'],
            'url' => ['required','url']
        ]);
        $iconPath = handleUpload('icon');
        $social =  DoctorSocial::findOrFail($id);
        $social->icon = (!empty($iconPath)? $iconPath : $social->icon ) ;
        $social->url = $request->url;
        $social->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.doctor-social.index',['doctor_id' => $request->doctor_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social = DoctorSocial::findOrFail($id);
        deleteFileIfExist(filePath: $social->icon);
        $social->delete();
        return redirect()->route('backend.doctor-social.index')->with('success', 'Uğurla silindi!');
    }
}
