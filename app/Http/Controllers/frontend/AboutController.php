<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutBanner;
use App\Models\AboutUs;
use App\Models\Advantage;
use App\Models\Doctor;
use App\Models\Partner;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about = AboutBanner::first();
        $aboutUs = AboutUs::first();
        $advantages = Advantage::all();
        $doctors = Doctor::all();
        $partners  = Partner::all();
        return view('frontend.about.index',compact(
    'about',
   'aboutUs',
              'advantages',
              'doctors',
              'partners'
        ));

    }
}
