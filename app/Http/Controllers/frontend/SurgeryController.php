<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Surgery;
use App\Models\SurgeryBanner;
use Illuminate\Http\Request;

class SurgeryController extends Controller
{
    public function index(Request $request){
        $surgery = SurgeryBanner::first();
        $surgeries = Surgery::query();
        if($request->filled('search')){
            $surgeries = $surgeries->where('title_'.app()->getLocale(),'like','%'.$request->search.'%');
        }
        $surgeries=$surgeries->get();
        return view('frontend.surgery.index',compact(
            'surgery',
           'surgeries',
                ));
    }
    public function showSurgery($language, $slug){
        $surgery = Surgery::where("slug_".app()->getLocale(), $slug)->firstOrFail();
        $surgeries = Surgery::all();

        return view('frontend.surgery.surgery-detail',compact(
            'surgery',
                      'surgeries',

                ));

    }
}
