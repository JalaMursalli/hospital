<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $blogs = Blog::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;

        })->paginate(10);

        return view('backend.blogs.index', compact('search', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog = new Blog();
        return view('backend.blogs.create',compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image1' => ['required','image'],
            'image2' => ['required','image'],
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'date' => ['required','date'],
            'meta_title_az'=> ['required', 'max:200'],
            'meta_title_en'=> ['required', 'max:200'],
            'meta_title_ru'=> ['required', 'max:200'],
            'meta_description_az' => ['required'],
            'meta_description_en' => ['required'],
            'meta_description_ru' => ['required'],
            'alt_image1_az' => ['required','max:200'],
            'alt_image1_en' => ['required','max:200'],
            'alt_image1_ru' => ['required','max:200'],
            'alt_image2_az' => ['required','max:200'],
            'alt_image2_en' => ['required','max:200'],
            'alt_image2_ru' => ['required','max:200']

         ]);
         $imagePath1 = handleUpload('image1');
         $imagePath2 = handleUpload('image2');
         $blog = new Blog();
         $blog->image1 =  $imagePath1;
         $blog->image2 =  $imagePath2;
         $blog->title_az = $request->title_az;
         $blog->title_en = $request->title_en;
         $blog->title_ru = $request->title_ru;
         $blog->slug_az = Str::slug($request->title_az);
         $blog->slug_en = Str::slug($request->title_en);
         $blog->slug_ru = Str::slug($request->title_ru);
         $blog->description_az = $request->description_az;
         $blog->description_en = $request->description_en;
         $blog->description_ru = $request->description_ru;
         $blog->date = $request->date;
         $blog->meta_title_az = $request->meta_title_az;
         $blog->meta_title_en = $request->meta_title_en;
         $blog->meta_title_ru = $request->meta_title_ru;
         $blog->meta_description_az = $request->meta_description_az;
         $blog->meta_description_en = $request->meta_description_en;
         $blog->meta_description_ru = $request->meta_description_ru;
         $blog->alt_image1_az = $request->alt_image1_az;
         $blog->alt_image1_en = $request->alt_image1_en;
         $blog->alt_image1_ru = $request->alt_image1_ru;
         $blog->alt_image2_az = $request->alt_image2_az;
         $blog->alt_image2_en = $request->alt_image2_en;
         $blog->alt_image2_ru = $request->alt_image2_ru;
         $blog->save();
         toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.blog.index');

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
        $blog = Blog::findOrFail($id);
        return view('backend.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image1' => ['image'],
            'image2' => ['image'],
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'date' => ['required','date'],
            'meta_title_az'=> ['required', 'max:200'],
            'meta_title_en'=> ['required', 'max:200'],
            'meta_title_ru'=> ['required', 'max:200'],
            'meta_description_az' => ['required'],
            'meta_description_en' => ['required'],
            'meta_description_ru' => ['required'],
            'alt_image1_az' => ['required','max:200'],
            'alt_image1_en' => ['required','max:200'],
            'alt_image1_ru' => ['required','max:200'],
            'alt_image2_az' => ['required','max:200'],
            'alt_image2_en' => ['required','max:200'],
            'alt_image2_ru' => ['required','max:200']

         ]);
          $imagePath1 = handleUpload('image1');
         $imagePath2 = handleUpload('image2');
         $blog = Blog::findOrFail($id);
         $blog->image1 =  (!empty($imagePath1) ? $imagePath1 : $blog->image1);;
         $blog->image2 =  (!empty($imagePath2) ? $imagePath2 : $blog->image2);;
         $blog->title_az = $request->title_az;
         $blog->title_en = $request->title_en;
         $blog->title_ru = $request->title_ru;
         $blog->slug_az = Str::slug($request->title_az);
         $blog->slug_en = Str::slug($request->title_en);
         $blog->slug_ru = Str::slug($request->title_ru);
         $blog->description_az = $request->description_az;
         $blog->description_en = $request->description_en;
         $blog->description_ru = $request->description_ru;
         $blog->date = $request->date;
         $blog->meta_title_az = $request->meta_title_az;
         $blog->meta_title_en = $request->meta_title_en;
         $blog->meta_title_ru = $request->meta_title_ru;
         $blog->meta_description_az = $request->meta_description_az;
         $blog->meta_description_en = $request->meta_description_en;
         $blog->meta_description_ru = $request->meta_description_ru;
         $blog->alt_image1_az = $request->alt_image1_az;
         $blog->alt_image1_en = $request->alt_image1_en;
         $blog->alt_image1_ru = $request->alt_image1_ru;
         $blog->alt_image2_az = $request->alt_image2_az;
         $blog->alt_image2_en = $request->alt_image2_en;
         $blog->alt_image2_ru = $request->alt_image2_ru;
         $blog->save();
         toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        deleteFileIfExist($blog->image1);
        deleteFileIfExist($blog->image2);
        $blog->delete();
        return redirect()->route('backend.blog.index')->with('success', 'Uğurla silindi!');
    }
}
