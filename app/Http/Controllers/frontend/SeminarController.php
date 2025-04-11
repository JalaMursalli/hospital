<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use App\Models\SeminarBanner;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function index(){
        $seminar = SeminarBanner::first();
        $seminars = Seminar::all();
        return view('frontend.seminars.index',compact(
            'seminar',
           'seminars',
                ));
    }
    public function showSeminar($language, $slug){
        $seminar = Seminar::where("slug_".app()->getLocale(), $slug)->firstOrFail();
        $latestSeminars = Seminar::orderBy('created_at', 'desc')->take(3)->get();
        return view('frontend.seminars.seminar-detail', compact(
            'seminar',
            'latestSeminars'
        ));
    }

    public function getPopularSeminars(Request $request){
        $search = $request->get('search');
        $query = Seminar::query()->orderBy('created_at','desc');
        if(!is_null($search)){
            $query->where('title_'.app()->getLocale(),'like',"%$search%");
        }
        $seminars = $query->take(3)->get();
        $view = view('frontend.seminars.section.popular-seminars',compact('seminars'))->render();
        return response([
            'view'=>$view,
        ]);
    }
}
