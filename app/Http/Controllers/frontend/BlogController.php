<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogBanner;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){


        $blog = BlogBanner::first();
        $blogs = Blog::query();

        if($request->filled('search')){
            $blogs = $blogs->where('title_'.app()->getLocale(),'like','%'.$request->search.'%');
        }
        $blogs = $blogs->paginate(10);
        return view('frontend.blogs.index',compact(
            'blog',
            'blogs'
        ));
    }
    public function showBlog($language, $slug){
        $blog = Blog::where("slug_".app()->getLocale(), $slug)->firstOrFail();
        $latestBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('frontend.blogs.blog-detail', compact(
            'blog',
            'latestBlogs'
        ));
    }

    public function getPopularBlogs(Request $request){
        $search = $request->get('search');
        $query = Blog::query()->orderBy('created_at','desc');
        if(!is_null($search)){
            $query->where('title_'.app()->getLocale(),'like',"%$search%");
        }
        $blogs = $query->take(3)->get();
        $view = view('frontend.blogs.section.popular-blogs',compact('blogs'))->render();
        return response([
            'view'=>$view,
        ]);
    }
}
