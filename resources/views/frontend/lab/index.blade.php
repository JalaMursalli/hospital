@extends('frontend.layouts.layout')
@section('content')
@section('title',$settings['lab'])
    <div class="detail-banner">
        <div class="nav">
            <a href="{{route('home')}}" class="logo">
                <img src="{{ asset('frontend/assets/images/logo.svg') }}" alt="">
            </a>
            <div class="header-right">
               @include('frontend.layouts.language')
                <button class="hamburger" type="button">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 6H21V8H3V6ZM3 11H21V13H3V11ZM3 16H21V18H3V16Z" fill="#3D8E86" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="pageDirection">
        <a href="{{route('home')}}" class="pageDirection-item">{{$settings['home']}}</a>
        <span class="active">
            <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.504 0.48H2.344L6.216 4.144L2.344 7.824H0.504L4.376 4.144L0.504 0.48ZM9.129 0.48H10.969L14.841 4.144L10.969 7.824H9.129L13.001 4.144L9.129 0.48Z"
                    fill="#636363" />
            </svg>
        </span>
        <a href="{{ route('lab') }}" class="pageDirection-item active">{{ $settings['lab'] }}</a>
    </div>
    <div class="lab-search-container">
        <div class="custom-select">
            <div class="select-current">

                @if (request()->category_id)
                    <div class="select-trigger">
                        <p>{{ $selectedCategory->title }}</p>
                    </div>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 10L12 15L17 10H7Z" fill="#B7B7B7" />
                    </svg>
                @else
                    <div class="select-trigger">
                        <p>{{ $settings['choose'] }}</p>
                    </div>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 10L12 15L17 10H7Z" fill="#B7B7B7" />
                    </svg>
                @endif
            </div>
            <div class="select-options">

                @foreach ($serviceCategories as $category)
                    <div class="option_item" data-id="{{ $category?->id }}">
                        <img src="{{ $category?->icon }}" alt="">
                        <p>{{ $category?->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <form class="lab-search">
            <input type="hidden" id="category" name="category_id" value="{{ request()->category_id }}">
            <input type="text" placeholder="{{ $settings['labSearch'] }}" name="search"
                value="{{ request()->search }}">
            <button type="submit" class="submitLabSearch">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.4995 14H14.7095L14.4295 13.73C15.0544 13.0039 15.5112 12.1487 15.767 11.2256C16.0229 10.3024 16.0715 9.33413 15.9095 8.38998C15.4395 5.60998 13.1195 3.38997 10.3195 3.04997C9.3351 2.92544 8.33527 3.02775 7.39651 3.34906C6.45775 3.67038 5.60493 4.20219 4.90332 4.90381C4.20171 5.60542 3.66989 6.45824 3.34858 7.397C3.02726 8.33576 2.92495 9.33559 3.04949 10.32C3.38949 13.12 5.60949 15.44 8.38949 15.91C9.33364 16.072 10.3019 16.0234 11.2251 15.7675C12.1483 15.5117 13.0035 15.0549 13.7295 14.43L13.9995 14.71V15.5L18.2495 19.75C18.6595 20.16 19.3295 20.16 19.7395 19.75C20.1495 19.34 20.1495 18.67 19.7395 18.26L15.4995 14ZM9.49949 14C7.00949 14 4.99949 11.99 4.99949 9.49997C4.99949 7.00997 7.00949 4.99997 9.49949 4.99997C11.9895 4.99997 13.9995 7.00997 13.9995 9.49997C13.9995 11.99 11.9895 14 9.49949 14Z"
                        fill="#3D8E86" />
                </svg>
            </button>
        </form>
    </div>
    <div class="lab-container">
        <h2>{{ $settings['serviceFee'] }}</h2>
        <div class="lab-list">
            @foreach ($services as $service)
                <div class="lab-item">
                    <h3 class="analysis-name">{{ $service?->title }}</h3>
                    <p class="analysis-price">
                        {{ $service?->price }}
                        <img src="{{ asset('frontend/assets/icons/manatIcon.svg') }}" alt="">
                    </p>
                </div>
            @endforeach


        </div>
    </div>
@endsection


@push('js')
    <script>
        $(".option_item").click(function() {
            var id = $(this).attr('data-id');
            $("#category").val(id)
        })
    </script>
@endpush
