<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactApply;
use App\Models\ContactBanner;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contactBanner = ContactBanner::first();
        $contactUs = ContactUs::first();
        $contact = Contact::first();
        return view('frontend.contact.index',compact(
            'contactBanner',
           'contactUs',
                    'contact'
                ));
    }
    public function apply(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'max:200'],
            'text' => ['nullable', 'max:5000'],
        ],[
            "name.required"=>__('frontend.name_required'),
            "name.max"=>__('frontend.name_max'),
            "email.required"=>__('frontend.surname_required'),
            "email.demand"=>__('frontend.email_demand'),
            "phone.required"=>__('frontend.phone_required'),
            "phone.max"=>__('frontend.phone_max'),
            "text.max"=>__('frontend.phone_max'),

        ]);
        $application = new ContactApply();

        $application->name = $request->name;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->text = $request->text;
        $application->save();

        return redirect()->back()->with('success', 'Müraciətiniz təsdiq olundu!');
    }
}

