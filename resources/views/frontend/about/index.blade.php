@extends('frontend.layouts.layout')
@section('content')
 @include('frontend.about.about-banner')
 <div class="about-container">
    <div class="about-img-area">
        <div class="about_apply">
            <img src="{{asset('frontend/assets/images/aboutImgBg.png')}}" alt="" class="about_apply_bg">
            <a href="contact.html" class="applyLink">{{$settings['apply']}}</a>
        </div>
        <img src="{{$aboutUs?->image}}" alt="" class="aboutImg">
    </div>
    <div class="about-content">
        <h2>{{$aboutUs?->title}}</h2>
        <div class="about-text">
            <p>{!!$aboutUs?->description!!}</p>

        </div>
    </div>
</div>
@include('frontend.about.advantage')
@include('frontend.about.doctor-list')
@include('frontend.about.partner')
@endsection
