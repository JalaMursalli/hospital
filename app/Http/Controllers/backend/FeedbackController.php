<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Exception;
use FactoryGenerator;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $feedbacks = Feedback::when($search, function ($query, $search) {
            return $query->where('position_az', 'like', "%{$search}%")
            ->orWhere('position_en', 'like', "%{$search}%")
            ->orWhere('position_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.feedback.index', compact('search', 'feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $feedback = new Feedback();
        return view('backend.feedback.create',compact('feedback'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required','image'],
            'ranking' => ['required','integer','min:1','max:5'],
            'position_az' => ['required', 'max:200'],
            'position_en' => ['required', 'max:200'],
            'position_ru' => ['required', 'max:200'],
            'description_az' => ['required'],
            'description_en' => ['required'],
            'description_ru' => ['required'],
            'doctor_id'=>['required','integer','exists:doctors,id'],
        ]);

        $imagePath = handleUpload('image');
        $feedback = new Feedback();
        $feedback->image = $imagePath;
        $feedback->ranking = $request->ranking;
        $feedback->doctor_id = $request->doctor_id;
        $feedback->position_az = $request->position_az;
        $feedback->position_en = $request->position_en;
        $feedback->position_ru = $request->position_ru;
        $feedback->description_az = $request->description_az;
        $feedback->description_en = $request->description_en;
        $feedback->description_ru = $request->description_ru;
        $feedback->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.feedback.index',['doctor_id' => $request->doctor_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('backend.feedback.edit',compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      try{
        $request->validate([
            'image' => ['image'],
            'ranking' => ['required','integer','min:1','max:5'],
            'position_az' => ['required', 'max:200'],
            'position_en' => ['required', 'max:200'],
            'position_ru' => ['required', 'max:200'],
            'description_az' => ['required'],
            'description_en' => ['required'],
            'description_ru' => ['required'],
            'doctor_id'  => ['required','integer','exists:doctors,id'],
        ]);
        $imagePath = handleUpload('image');
        $feedback = Feedback::findOrFail($id);
        $feedback->image = (!empty($imagePath)? $imagePath : $feedback->image ) ;
        $feedback->ranking = $request->ranking;
        $feedback->doctor_id = $request->doctor_id;
        $feedback->position_az = $request->position_az;
        $feedback->position_en = $request->position_en;
        $feedback->position_ru = $request->position_ru;
        $feedback->description_az = $request->description_az;
        $feedback->description_en = $request->description_en;
        $feedback->description_ru = $request->description_ru;
        $feedback->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.feedback.index',['doctor_id' => $request->doctor_id]);
      }
      catch(Exception $e){
        return $e;
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedback = Feedback::findOrFail($id);
        deleteFileIfExist($feedback->image);
        $feedback->delete();
        return redirect()->route('backend.feedback.index')->with('success', 'Uğurla silindi!');

    }
}
