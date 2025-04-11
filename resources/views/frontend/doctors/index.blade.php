@extends('frontend.layouts.layout')
@section('content')
@include('frontend.doctors.doctor-banner')

@section('title',$settings['doctors'])
<div class="doctors-container">
    <div class="all-doctors">

        @foreach ($doctors as $doctor)
       <a href="{{route('showDoctor', ['language'=>app()->getLocale(),'slug'=>$doctor->slug])}} " class="doctor-cart">


            <div class="cart-main-container">
                <div class="cart-img">
                    <img src="{{asset($doctor?->image)}}" alt="">
                </div>
                <h2 class="doctor-name">{{$doctor?->name}}</h2>

                <p class="doctor-specialty">{{$doctor?->position}}</p>
            </div>
            <div class="cart-body">
                <div class="cart-detail">
                    <div class="short-desc">
                        <p>
                           {!! Str::limit(strip_tags($doctor?->description),150) !!}
                        </p>
                    </div>
                </div>
                <div class="cart-body-right">
                    <div class="decor"></div>
                    <div class="cart-direction-container">
                        <div class="cart-direction">
                            <span>
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.6669 21.6666L6.6669 18.3333L26.6669 18.3333L17.5002 9.16662L19.8669 6.79995L33.0669 20L19.8669 33.2L17.5002 30.8333L26.6669 21.6666L6.6669 21.6666Z" fill="white"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach


    </div>







    <div class="pagination">
        <!-- Previous Page Link -->
        @if ($doctors->currentPage() > 1)
            <a href="{{ $doctors->previousPageUrl() }}" class="prev">
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
            @for ($i = 1; $i <= $doctors->lastPage(); $i++)
                <a href="{{ $doctors->url($i) }}" class="pagination-item {{ $i == $doctors->currentPage() ? 'active' : '' }}">

                </a>
            @endfor
        </div>

        <!-- Next Page Link -->
        @if ($doctors->hasMorePages())
            <a href="{{ $doctors->nextPageUrl() }}" class="next">
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
