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
                                        <a href="/{{$language}}/department-details/{{$department->$key}}" class="other-lang-item">  {{ strtoupper($language) }}</a>

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
    <a href="{{route('department')}}" class="pageDirection-item">{{$settings['services']}}</a>
    <span class="active">
        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.504 0.48H2.344L6.216 4.144L2.344 7.824H0.504L4.376 4.144L0.504 0.48ZM9.129 0.48H10.969L14.841 4.144L10.969 7.824H9.129L13.001 4.144L9.129 0.48Z" fill="#636363"/>
        </svg>
    </span>
    <a href="{{route('showDepartment', ['language'=>app()->getLocale(),'slug'=>$department->slug])}}" class="pageDirection-item active">{{$department->title}}</a>
</div>
<div class="department-detail-container">
    <div class="department-detail-one">
        <div class="department-detail-img">
            <img src="{{asset($department?->image1)}}" alt="">
        </div>
        <div class="department-detail-content">
            <div class="desc">
                <p>{!! $department?->description1 !!}</p>
            </div>
        </div>
    </div>
    <div class="department-detail-two">
        <div class="department-detail-content">
            <div class="desc">
            <p>{!! $department?->description2 !!}</p>
            </div>
        </div>
        <div class="department-detail-img">
            <img src="{{asset($department?->image2)}}" alt="">
        </div>
    </div>
</div>

<div class="doctors-slide-container">
    <h2>Həkimlərimiz</h2>

    <div class="doctors-slide swiper">
        <div class="swiper-wrapper">
            @foreach ( $doctors as $doctor)
            <a href="{{route('showDoctor', ['language'=>app()->getLocale(),'slug'=>$department->slug])}}" class="doctor-card swiper-slide">
                <div class="doctorImg">
                    <img src="{{asset($doctor?->image)}}" alt="">
                </div>
                <div class="cardBody">
                    <div class="cardMain">
                        <h3 class="drName">{{$doctor?->name}}</h3>
                        <p class ="drPosition">{{$doctor?->position}}</p>
                    </div>
                    <span class="direction">
                        <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.66699 14.4285L4.66699 12.2856L17.167 12.2856L11.4378 6.39277L12.917 4.87134L21.167 13.3571L12.917 21.8428L11.4378 20.3213L17.167 14.4285L4.66699 14.4285Z" fill="white"/>
                            </svg>
                    </span>
                </div>
                <img src="{{asset('frontend/assets/images/doctorSlideCartBg.png')}}" alt="" class="doctorSlideCartBg">
            </a>
            @endforeach


        </div>
        <div class="swiper-buttons">
            <div class="swiper-button-prev">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#CCCCCC" stroke-opacity="0.8"/>
                    <path d="M24.0002 15.0001V17.0001H12.0002L17.5002 22.5001L16.0802 23.9201L8.16016 16.0001L16.0802 8.08008L17.5002 9.50008L12.0002 15.0001H24.0002Z" fill="#CCCCCC" fill-opacity="0.8"/>
                    </svg>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="31.5" y="31.5" width="31" height="31" rx="15.5" transform="rotate(-180 31.5 31.5)" stroke="#CCCCCC" stroke-opacity="0.8"/>
                    <path d="M7.99984 16.9999L7.99984 14.9999L19.9998 14.9999L14.4998 9.49992L15.9198 8.07992L23.8398 15.9999L15.9198 23.9199L14.4998 22.4999L19.9998 16.9999L7.99984 16.9999Z" fill="#CCCCCC" fill-opacity="0.8"/>
                    </svg>

            </div>
        </div>
    </div>
</div>
@endsection

