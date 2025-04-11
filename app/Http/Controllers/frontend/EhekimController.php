<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Ehekim;
use App\Models\EhekimApplication;
use App\Models\Social;
use Illuminate\Http\Request;

class EhekimController extends Controller
{
    public function index(){
        $eHekim = Ehekim::first();
        $socials = Social::all();
        return view('frontend.e-hekim.index',compact(
            'eHekim',
            'socials'
                ));
    }
    public function apply(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'max:200'],
            'surname' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'max:200'],
        ]);
        $application = new EhekimApplication();

        $application->name = $request->name;
        $application->surname = $request->surname;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->save();

        return redirect()->back()->with('success', 'Müraciətiniz təsdiq olundu!');
    }
}
