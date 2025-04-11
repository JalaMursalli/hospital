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
                                        <a href="/{{$language}}/surgery-details/{{$surgery->$key}}" class="other-lang-item">  {{ strtoupper($language) }}</a>

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
    <a href="index.html" class="pageDirection-item">Əsas səhifə</a>
    <span>
        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.504 0.48H2.344L6.216 4.144L2.344 7.824H0.504L4.376 4.144L0.504 0.48ZM9.129 0.48H10.969L14.841 4.144L10.969 7.824H9.129L13.001 4.144L9.129 0.48Z" fill="#636363"/>
        </svg>
    </span>
    <a href="{{route('surgery')}}" class="pageDirection-item">{{$settings['services']}}</a>
    <span class="active">
        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.504 0.48H2.344L6.216 4.144L2.344 7.824H0.504L4.376 4.144L0.504 0.48ZM9.129 0.48H10.969L14.841 4.144L10.969 7.824H9.129L13.001 4.144L9.129 0.48Z" fill="#636363"/>
        </svg>
    </span>
    <a href="{{route('showSurgery', ['language'=>app()->getLocale(),'slug'=>$surgery->slug])}}" class="pageDirection-item active">{{$surgery->title}}</a>
</div>
<div class="department-detail-container">
    <div class="department-detail-one">
        <div class="department-detail-img">
            <img src="{{asset($surgery?->image1)}}" alt="">
        </div>
        <div class="department-detail-content">
            <div class="desc">
                <p>{!! $surgery?->description1 !!}</p>
            </div>
        </div>
    </div>
    <div class="department-detail-two">
        <div class="department-detail-content">
            <div class="desc">
            <p>{!! $surgery?->description2 !!}</p>
            </div>
        </div>
        <div class="department-detail-img">
            <img src="{{asset($surgery?->image2)}}" alt="">
        </div>
    </div>
</div>
@endsection
