@extends('frontend.layouts.layout')
@section('content')
@section('title',$settings['career'])
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
                                        <a href="/{{$language}}/career-details/{{$career->$key}}" class="other-lang-item">  {{ strtoupper($language) }}</a>

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
    <a href="{{route('career')}}" class="pageDirection-item">{{$settings['career']}}</a>
    <span class="active">
        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.504 0.48H2.344L6.216 4.144L2.344 7.824H0.504L4.376 4.144L0.504 0.48ZM9.129 0.48H10.969L14.841 4.144L10.969 7.824H9.129L13.001 4.144L9.129 0.48Z" fill="#636363"/>
        </svg>
    </span>
    <a href="{{route('showCareer', ['language'=>app()->getLocale(),'slug'=>$career->slug])}}" class="pageDirection-item active">{{$career?->title}}</a>
</div>
<div class="vacancy-detail-container">
    <div class="vacancy-detail-hero">
        <div class="vacancy-detail-img">
            <img src="{{$career?->image}}" alt="">
        </div>
        <div class="short-details">
            <div class="short-detail-item">
                <h2>Mövqə</h2>
                <p>{{$career?->title}}</p>
            </div>
            <div class="short-detail-item">
                <h2>Ünvan</h2>
                <p>{{$career?->address}}</p>
            </div>
            <div class="short-detail-item">
                <h2>Əmək haqqı</h2>
                <p>{{$career?->salary}}</p>
            </div>
            <div class="short-detail-item">
                <h2>İş günləri və saatları</h2>
                <p>{{$career?->workSchedule}}</p>
            </div>
        </div>
    </div>
    <div class="vacancy-detail-main">
        <div class="detail-box">
           <p>{!! $career?->description2!!}</p>
        </div>
        <div class="detail-box">
            <p>{!! $career?->description3!!}</p>
        </div>
    </div>
    <form action="{{ route('career.apply', ['language'=>app()->getLocale()]) }}" class="vacancy-detail-form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-line">
            <input type="hidden" name="career_id" value="{{ $career->id }}">
            <input type="text" name = "name" placeholder="{{$settings['fullname']}}" value="{{ old('name') }}" />
            @error('name') <span class="text-danger"><p style="color: red">{{ $message }}</p></span> @enderror
            <input type="text" name = "phone" placeholder="{{$settings['phone']}}"  value="{{ old('phone') }}" />
            @error('phone') <span class="text-danger"><p style="color: red">{{ $message }}</p></span> @enderror
            <input type="text" name = "email" placeholder="{{$settings['mail']}}" value="{{ old('email') }}" />
            @error('email') <span class="text-danger"><p style="color: red">{{ $message }}</p></span> @enderror
            <div class="file-area">
                <p>
                    {{$settings['cv']}}

                </p>
                <input type="file"name="cv" >
                @error('cv') <span class="text-danger"><p style="color: red">{{ $message }}</p></span> @enderror
                <span class="fileName"></span>
            </div>
        </div>
        <textarea name="text" id="" placeholder="{{$settings['text']}}">{{ old('text') }}</textarea>
        @error('text') <span class="text-danger"><p style="color: red">{{ $message }}</p></span> @enderror
        <button class="sendCvBtn" type="submit"> {{$settings['apply']}}</button>
    </form>
</div>
@endsection
