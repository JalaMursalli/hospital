<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index(Request $request){
        $serviceCategories = ServiceCategory::all();
        $services = Service::query();

        $selectedCategory = null;

        if($request->has('search') && $request->search!=''){
            $services = $services->where('title_'.app()->getLocale(),'like','%'.$request->search.'%');
        }

        if($request->has('category_id') && $request->category_id!=''){
            $services = $services->where('service_category_id', $request->category_id);
            $selectedCategory = ServiceCategory::find($request->category_id);
        }

        $services = $services->get();
        return view('frontend.lab.index',compact(
            'services', 'serviceCategories','selectedCategory'
                ));
    }
}
