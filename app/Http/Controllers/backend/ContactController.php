<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::first();
        return view('backend.contact.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'address_title_az' => ['required','max:200'],
                'address_title_en' => ['required','max:200'],
                'address_title_ru' => ['required','max:200'],
                'address_icon' => ['nullable','image'],
                'email_title_az' => ['required','max:200'],
                'email_icon' => ['nullable','image'],
                'phone_title_az' => ['required','max:200'],
                'phone_icon' => ['nullable','image'],
                'map' => ['required'],
                'phone_title2' => ['nullable','max:200'],
            ]);
            $contact = Contact::first();
            if($request->hasFile('address_icon')){
                $imagePath_address = handleUpload('address_icon');
            }
            if($request->hasFile('email_icon')){
                $imagePath_email = handleUpload('email_icon');
            }

            if($request->hasFile('phone_icon')){
                $imagePath_phone = handleUpload('phone_icon');
            }
            Contact::updateOrCreate(
                ['id' => $id],
                [
                    'address_title_az' => $request->address_title_az,
                    'address_title_en' => $request->address_title_en,
                    'address_title_ru' => $request->address_title_ru,
                    'address_icon' => (!empty($imagePath_address)? $imagePath_address :$contact?->address_icon),
                    'email_title_az' => $request->email_title_az,
                    'email_title_en' => $request->email_title_en,
                    'email_title_ru' => $request->email_title_ru,
                    'email_icon' => (!empty($imagePath_email)? $imagePath_email :$contact?->email_icon),
                    'phone_title_az' => $request->phone_title_az,
                    'phone_title_en' => $request->phone_title_en,
                    'phone_title_ru' => $request->phone_title_ru,
                    'phone_icon' => (!empty($imagePath_phone)? $imagePath_phone :$contact?->phone_icon),
                    'map' => $request->map,
                    'phone_title2' => $request->phone_title2,

                ]
            );
            toastr()->success('Uğurla yeniləndi', 'Congrats');
            return redirect()->back();
        }catch(\Exception $exception){
            return $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
