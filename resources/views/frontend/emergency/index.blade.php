@extends('frontend.layouts.layout')
@section('content')
@section('title',$settings['emergency'])
<div class="detail-banner">
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
</div>
<div class="pageDirection">
    <a href="{{route('home')}}" class="pageDirection-item">{{$settings['home']}}</a>
    <span class="active">
        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.504 0.48H2.344L6.216 4.144L2.344 7.824H0.504L4.376 4.144L0.504 0.48ZM9.129 0.48H10.969L14.841 4.144L10.969 7.824H9.129L13.001 4.144L9.129 0.48Z" fill="#636363"/>
        </svg>
    </span>
    <a href="vacancyDetail.html" class="pageDirection-item active">{{$settings['emergency']}}</a>
</div>
<div class="tty-container">
    <div class="tty-hero">
        <div class="tty-img">
            <img src="{{$emergency?->image}}" alt="">
        </div>
        <div class="tty-short-detail">
            <h2>{{$emergency?->title1}} </h2>
            <div class="short-desc">
                <p>{!!$emergency?->description1!!} </p>

            </div>
        </div>
    </div>
    <div class="tty-detail-boxes">
        <div class="tty-detail-box">
            <h3 class="tty-box-title">
                {{$emergency?->title2}}
            </h3>
            <div class="tty-detail">
             <p>{!!$emergency?->description2!!}</p>
            </div>
        </div>
        <div class="tty-detail-box">
            <h3 class="tty-box-title">
              {{$emergency?->title3}}
            </h3>
            <div class="tty-detail">
                <p>{!!$emergency?->description3!!}</p>
            </div>
        </div>
    </div>
    <div class="lab-container">
        <h2>{{$settings['serviceFee']}}</h2>
        <div class="lab-list">
            @foreach ($services as $service)
            <div class="lab-item">
                <h3 class="analysis-name">{{ $service?->title}}</h3>
                <p class="analysis-price">
                    {{ $service?->price}}
                    <img src="{{asset('frontend/assets/icons/manatIcon.svg')}}" alt="">
                </p>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
