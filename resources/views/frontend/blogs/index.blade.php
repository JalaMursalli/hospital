@extends('frontend.layouts.layout')
@section('content')
@include('frontend.blogs.blog-banner')
@section('title',$settings['blog'])
<div class="blogs">
    <div class="all-blogs">

        @foreach ($blogs as $blog)
        <a href="{{route('showBlog', ['language'=>app()->getLocale(),'slug'=>$blog->slug])}}" class="blog-cart">
            <div class="cart-head">
                <div class="cart-date">
                    <img src="{{asset('frontend/assets/icons/clockIcon.svg')}}" alt="">
                    <p>{{$blog?->date->translatedFormat('d F Y')}}</p>
                </div>
                <img src="{{$blog?->image1}}" alt="" class="cartImg">
            </div>
            <div class="cart-body">
                <h2 class="cartname">{{$blog?->title}}</h2>
                <div class="short-desc">
                    <p>{{ strip_tags($blog?->description) }}</p>
                </div>
                <span class="more">{{$settings['more']}}</span>
            </div>
        </a>
        @endforeach


    </div>

    <div class="pagination">
        <!-- Previous Page Link -->
        @if ($blogs->currentPage() > 1)
            <a href="{{ $blogs->previousPageUrl() }}" class="prev">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#CCCCCC" stroke-opacity="0.8"/>
                    <path d="M24.0002 15.0001V17.0001H12.0002L17.5002 22.5001L16.0802 23.9201L8.16016 16.0001L16.0802 8.08008L17.5002 9.50008L12.0002 15.0001H24.0002Z" fill="#CCCCCC" fill-opacity="0.8"/>
                </svg>
            </a>
        @else
            <span class="prev disabled">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#CCCCCC" stroke-opacity="0.8"/>
                    <path d="M24.0002 15.0001V17.0001H12.0002L17.5002 22.5001L16.0802 23.9201L8.16016 16.0001L16.0802 8.08008L17.5002 9.50008L12.0002 15.0001H24.0002Z" fill="#CCCCCC" fill-opacity="0.8"/>
                </svg>
            </span>
        @endif

        <div class="pagination-links">
            <!-- Loop through the pages and create pagination items -->
            @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                <a href="{{ $blogs->url($i) }}" class="pagination-item {{ $i == $blogs->currentPage() ? 'active' : '' }}">

                </a>
            @endfor
        </div>

        <!-- Next Page Link -->
        @if ($blogs->hasMorePages())
            <a href="{{ $blogs->nextPageUrl() }}" class="next">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="31.5" y="31.5" width="31" height="31" rx="15.5" transform="rotate(-180 31.5 31.5)" stroke="#CCCCCC" stroke-opacity="0.8"/>
                    <path d="M7.99984 16.9999L7.99984 14.9999L19.9998 14.9999L14.4998 9.49992L15.9198 8.07992L23.8398 15.9999L15.9198 23.9199L14.4998 22.4999L19.9998 16.9999L7.99984 16.9999Z" fill="#CCCCCC" fill-opacity="0.8"/>
                </svg>
            </a>
        @else
            <span class="next disabled">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="31.5" y="31.5" width="31" height="31" rx="15.5" transform="rotate(-180 31.5 31.5)" stroke="#CCCCCC" stroke-opacity="0.8"/>
                    <path d="M7.99984 16.9999L7.99984 14.9999L19.9998 14.9999L14.4998 9.49992L15.9198 8.07992L23.8398 15.9999L15.9198 23.9199L14.4998 22.4999L19.9998 16.9999L7.99984 16.9999Z" fill="#CCCCCC" fill-opacity="0.8"/>
                </svg>
            </span>
        @endif
    </div>

</div>
@endsection
