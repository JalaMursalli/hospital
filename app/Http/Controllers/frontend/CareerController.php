<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Career;
use App\Models\CareerBanner;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request){
        $career = CareerBanner::first();
        $careers = Career::query();
        $categories = Vacancy::get();
        $selectedCategory = null;

        if($request->has('search') && $request->search!=''){
            $careers = $careers->where('title_'.app()->getLocale(),'like','%'.$request->search.'%');
        }

        if($request->has('category_id') && $request->category_id!=''){
            $careers = $careers->where('vacancy_id', $request->category_id);
            $selectedCategory = Vacancy::find($request->category_id);
        }

        $careers = $careers->paginate(4);


        return view('frontend.careers.index',compact(
            'career',
            'careers',
            'categories',
            'selectedCategory'
        ));
    }
    public function showCareer($language, $slug){
        $career = Career::where("slug_".app()->getLocale(), $slug)->firstOrFail();
        return view('frontend.careers.career-detail', compact(
            'career'
        ));
    }
    public function apply(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'max:200'],
            'text' => ['nullable', 'max:5000'],
            'cv' => ['required', 'file', 'mimes:pdf,docx,png,jpg,jpeg', 'max:10240'],
            'career_id'=>['required','integer','exists:careers,id'],
        ],[
            "name.required"=>__('frontend.name_required'),
            "name.max"=>__('frontend.name_max'),
            "email.required"=>__('frontend.surname_required'),
            "email.demand"=>__('frontend.email_demand'),
            "phone.required"=>__('frontend.phone_required'),
            "phone.max"=>__('frontend.phone_max'),
            "text.max"=>__('frontend.text_max'),
            "cv.required"=>__('frontend.cv_required'),
            "cv.types"=>__('frontend.cv_types'),
            "cv.max"=>__('frontend.cv_max'),

        ]);




        $cvPath = null;
        if ($request->hasFile('cv')) {
            // $cvFile = $request->file('cv');
            $cvPath = handleUpload('cv');
            // $cvPath = $cvFile->store('cv_uploads', 'public');
        }


        $careerApplication = new Apply();

        $careerApplication->name = $request->name;
        $careerApplication->email = $request->email;
        $careerApplication->phone = $request->phone;
        $careerApplication->text = $request->text;
        $careerApplication->cv = $cvPath;
        $careerApplication->career_id = $request->career_id;
        $careerApplication->save();

        return redirect()->back()->with('success', 'Müraciətiniz təsdiq olundu!');
    }

}
