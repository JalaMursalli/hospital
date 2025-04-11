<div class="header-banner">
    <img src="{{ asset($checkup?->image)}}" alt="" class="bannerBg">
    <div class="nav">
        <a href="{{route('home')}}" class="logo">
            <img src="{{asset('frontend/assets/images/logo.svg')}}" alt="">
        </a>
        <div class="header-right">
            @include('frontend.layouts.language')
            <button class="hamburger" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 6H21V8H3V6ZM3 11H21V13H3V11ZM3 16H21V18H3V16Z" fill="#3D8E86"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="nav-navigate">
        <div class="nav-navigate-left">
            <img src="{{asset('frontend/assets/images/headTitleBg.svg')}}" alt="">
            <h1 class="page-title">{{$checkup->title}}</h1>
        </div>
        <div class="breadcrumb">
            <a href="{{route('home')}}" class="breadcrumb-item">{{$settings['home']}}</a>
            <span>
                <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.504 0.48H2.344L6.216 4.144L2.344 7.824H0.504L4.376 4.144L0.504 0.48ZM9.129 0.48H10.969L14.841 4.144L10.969 7.824H9.129L13.001 4.144L9.129 0.48Z" fill="white"/>
                </svg>
            </span>
            <a href="{{route('checkup')}}" class="breadcrumb-item">{{$checkup->title}}</a>
        </div>
    </div>
</div>
