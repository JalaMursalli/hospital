<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentBanner;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request){
        $department = DepartmentBanner::first();
        $departments = Department::query();
        if($request->filled('search')){
            $departments = $departments->where('title_'.app()->getLocale(),'like','%'.$request->search.'%');
        }
        $departments=$departments->paginate(12);
        return view('frontend.departments.index',compact(
            'department',
            'departments',
                ));
    }
    public function showDepartment($language, $slug){
        $department = Department::where("slug_".app()->getLocale(), $slug)->firstOrFail();
        $departments = Department::all();

        $doctors = Doctor::where('department_id', $department->id )->get();
        return view('frontend.departments.department-detail',compact(
            'department',
                      'departments',
                      'doctors'
                ));

    }
}
