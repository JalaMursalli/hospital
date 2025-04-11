<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorBanner;
use App\Models\DoctorSocial;
use App\Models\Feedback;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){

        $doctor= DoctorBanner::first();
        $doctors = Doctor::paginate(9);
        return view('frontend.doctors.index',compact(
            'doctor',
            'doctors'
        ));
    }
    public function showDoctor($language, $slug){
        $doctor = Doctor::where("slug_".app()->getLocale(), $slug)->firstOrFail();
        $socials = DoctorSocial::all();
        $feedbacks= Feedback::all();
        return view('frontend.doctors.doctor-detail', compact(
            'doctor',
           'socials',
                      'feedbacks'
        ));
    }
}
