@extends('frontend.layouts.layout')
@section('content')
<div class="detail-banner">
    <div class="nav">
        <a href="{{route('home')}}" class="logo">
            <img src="{{asset('frontend/assets/images/logo.svg')}}" alt="">
        </a>
        <div class="header-right">
            <div class="header-lang">
                <button class="current-lang" type="button">
                    {{ strtoupper(app()->getLocale()) }}
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 10L12 15L17 10H7Z" fill="white"/>
                    </svg>
                </button>
                <div class="other-langs">

                    @foreach(['az','en','ru'] as $language)

                                        @if($language==app()->getLocale()) @continue @endif

                                        @php
                                            $key = 'slug_'.$language;
                                        @endphp
                                        <a href="/{{$language}}/blog-details/{{$blog->$key}}" class="other-lang-item">  {{ strtoupper($language) }}</a>

                                    @endforeach

                </div>
            </div>
            <button class="hamburger" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 6H21V8H3V6ZM3 11H21V13H3V11ZM3 16H21V18H3V16Z" fill="#3D8E86"/>
                </svg>
            </button>
        </div>
    </div>
</div>
<div class="pageDirection">
    <a href="{{route('home')}}" class="pageDirection-item">{{$settings['home']}}</a>
    <span>
        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.504 0.48H2.344L6.216 4.144L2.344 7.824H0.504L4.376 4.144L0.504 0.48ZM9.129 0.48H10.969L14.841 4.144L10.969 7.824H9.129L13.001 4.144L9.129 0.48Z" fill="#636363"/>
        </svg>
    </span>
    <a href="{{route('blog')}}" class="pageDirection-item">{{$settings['news']}}</a>
    <span class="active">
        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.504 0.48H2.344L6.216 4.144L2.344 7.824H0.504L4.376 4.144L0.504 0.48ZM9.129 0.48H10.969L14.841 4.144L10.969 7.824H9.129L13.001 4.144L9.129 0.48Z" fill="#636363"/>
        </svg>
    </span>
    <a href="{{route('showBlog', ['language'=>app()->getLocale(),'slug'=>$blog->slug])}}" class="pageDirection-item active">{{$blog?->title}}</a>
</div>
<div class="blog-detail-container">
    <div class="blog-detail-main">
        <div class="blog-detail-img">
            <div class="blog-time">
                <img src="{{asset('frontend/assets/images/blogDetailTimeBg.png')}}" alt="" class="timeBg">
                <div class="time-inner">
                    <p>{{$blog->date?->translatedFormat('d F Y')}}</p>
                </div>
            </div>
            <img src="{{$blog?->image2}}" alt="" class="detailImg">
        </div>
        <h1 class="blogName">{{$blog?->title}}</h1>
        <div class="blog-text">
            <p>{!!$blog?->description!!}</p>
        </div>
        <div class="detail-tags">
            <h2>Tags</h2>
            <div class="tag-items">
                <a href="blog.html" class="tag-item">Xəbər</a>
                <a href="blog.html" class="tag-item">Xəstəxana</a>
                <a href="blog.html" class="tag-item">Tədbir</a>
            </div>
        </div>
        <div class="blogPagination">
            <!-- Eger meselen blogdan evvel blog yoxdursa, ve ya sonra yoxdursa not item elave edilecek -->
            <a href="" class="prevBlog notItem">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.3335 12.8333L23.3335 15.1667L9.33352 15.1667L15.7502 21.5833L14.0935 23.24L4.85352 14L14.0935 4.76001L15.7502 6.41668L9.33352 12.8333L23.3335 12.8333Z" fill="white"/>
                </svg>
            </a>
            <a href="" class="nextBlog">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.66649 15.1667L4.66649 12.8333L18.6665 12.8333L12.2498 6.41666L13.9065 4.75999L23.1465 14L13.9065 23.24L12.2498 21.5833L18.6665 15.1667L4.66649 15.1667Z" fill="white"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="blog-detail-right">
        <div class="blogSearch">
            <form action="" class="blogSearch-inner">
                <button class="searchBlogBtn" type="submit">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.5 3C11.2239 3 12.8772 3.68482 14.0962 4.90381C15.3152 6.12279 16 7.77609 16 9.5C16 11.11 15.41 12.59 14.44 13.73L14.71 14H15.5L20.5 19L19 20.5L14 15.5V14.71L13.73 14.44C12.5504 15.4465 11.0506 15.9996 9.5 16C7.77609 16 6.12279 15.3152 4.90381 14.0962C3.68482 12.8772 3 11.2239 3 9.5C3 7.77609 3.68482 6.12279 4.90381 4.90381C6.12279 3.68482 7.77609 3 9.5 3ZM9.5 5C7 5 5 7 5 9.5C5 12 7 14 9.5 14C12 14 14 12 14 9.5C14 7 12 5 9.5 5Z" fill="#3D8E86"/>
                    </svg>
                </button>
                <input type="text" placeholder="Search" oninput="search_popular_posts(this)" name="search" value="{{request()->search}}">
            </form>
        </div>
        <div class="otherBlogs">
            <h2>{{$settings['latestBlogs']}}</h2>
            <div class="otherBlogs-items">
                @foreach ( $latestBlogs as $blog )
                <a href="{{route('showBlog', ['language'=>app()->getLocale(),'slug'=>$blog->slug])}}" class="otherBlogItem">
                    <div class="cartImg">
                        <img src="{{$blog?->image1}}" alt="">
                    </div>
                    <div class="cartBody">
                        <div class="blogDate">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 20C16.4 20 20 16.4 20 12C20 7.6 16.4 4 12 4C7.6 4 4 7.6 4 12C4 16.4 7.6 20 12 20ZM12 2C17.5 2 22 6.5 22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2ZM15.3 16.2L14 17L11 11.8V7H12.5V11.4L15.3 16.2Z" fill="#969696"/>
                            </svg>
                            <p>{{$blog?->date->translatedFormat('d F Y')}}</p>
                        </div>
                        <h3>{{$blog?->title}}</h3>
                    </div>
                </a>
                @endforeach


            </div>
        </div>
        <div class="discover-tags">
            <h2>Tags</h2>
            <div class="tag-items">
                <a href="blog.html" class="tag-item">Xəbər</a>
                <a href="blog.html" class="tag-item">Xəstəxana</a>
                <a href="blog.html" class="tag-item">Tədbir</a>
                <a href="blog.html" class="tag-item">Bütün xəbərlər</a>
                <a href="blog.html" class="tag-item">Xəbər</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        function search_popular_posts(input){
            let search_value = input.value.trim();
            let lang = document.querySelector('html').getAttribute('lang');
            let url = `/${lang}/get-popular-blogs?search=${search_value}`;
            let otherBlogsItems = document.querySelector('.otherBlogs-items');
            fetch(url)
                .then(res=>res.json())
                .then(data=>{
                    let view = data.view;
                    otherBlogsItems.innerHTML = view;
                })
        }
    </script>
@endpush
