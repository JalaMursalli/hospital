<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Department;
use App\Models\HomeBanner;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Social;
use App\Models\Surgery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $homeBanner = HomeBanner::first();
        $departments = Department::all();
        $surgeries = Surgery::all();
        $socials = Social::all();
        $contact = Contact::all();
        $diagnostics = ServiceCategory::all();
        $labs = Service::all();
        return view('frontend.home.home',compact(
            'homeBanner',
                    'departments',
                    'surgeries',
                    'socials',
                    'contact',
                    'diagnostics',
                    'labs'


        ));
    }
}
