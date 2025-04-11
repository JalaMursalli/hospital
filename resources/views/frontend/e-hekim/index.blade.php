@extends('frontend.layouts.layout')
@section('content')
 @section('title',$settings['about'])
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
    <a href="{{route('e-hekim')}}" class="pageDirection-item active">{{$settings['ehekim']}}</a>
</div>


<div class="e_hekim_main">
    <div class="e_hekim_container">
        <div class="e_hekim-content">
            <h2>{{$eHekim?->title}}</h2>
            <div class="short-desc">
                <p>{!!$eHekim?->description!!}</p>
            </div>
        </div>
        <form action="{{ route('ehekim.apply', ['language'=>app()->getLocale()]) }}" method="POST">
            @csrf
            <div class="form-main">
                <div class="form-items">
                    <div class="form-item">
                        <label for=""> {{$settings['name']}}</label>
                        <input type="text"  id="name" name="name" placeholder=" {{$settings['name']}}" value="{{ old('name') }}">
                        @error('name') <div class="error"><p style="color: red">{{ $message }}</p></div> @enderror
                    </div>
                    <div class="form-item">
                        <label for="">{{$settings['surname']}}</label>
                        <input type="text"  id="surname" name="surname" placeholder="{{$settings['surname']}}" value="{{ old('surname') }}">
                        @error('surname') <div class="error"><p style="color: red">{{ $message }}</p></div> @enderror
                    </div>
                    <div class="form-item">
                        <label for="">{{$settings['mail']}}</label>
                        <input type="text" id="email" name="email" placeholder="{{$settings['mail']}}" value="{{ old('email') }}">
                        @error('email') <div class="error"><p style="color: red">{{ $message }}</p></div> @enderror
                    </div>
                    <div class="form-item">
                        <label for="">{{$settings['phone']}}</label>
                        <input type="text" id="phone" name="phone" placeholder="+994 xx xxx xx xx" value="{{ old('phone') }}">
                        @error('phone') <div class="error"><p style="color: red">{{ $message }}</p></div> @enderror
                    </div>
                </div>
                <div class="e_hekim_socials">
                    <div class="socials">
                        @foreach ($socials as $social)
                        <a href="{{ $social?->url }}" class="social-item">
                            <img src="{{$social?->icon}}" alt="">
                        </a>
                        @endforeach


                    </div>
                    <div class="line"></div>
                </div>
            </div>
            <img src="{{asset('frontend/assets/images/e_hekimBg.png')}}" alt="" class="eHekimFormBg">
            <button class="submit_eHekim_form" type="submit"> {{$settings['apply']}}</button>
        </form>
    </div>
</div>
@endsection
