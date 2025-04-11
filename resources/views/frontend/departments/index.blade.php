@extends('frontend.layouts.layout')
@section('content')
@include('frontend.departments.department-banner')
@section('title',$settings['department'])
<div class="departments-container">
    <div class="departments-head">
        <h2 class="headTitle">{{$settings['departments']}}</h2>
        <form action="" class="search-department-form">
            <input type="text" placeholder="{{$settings['departmentSearch']}}"  name="search" value="{{request()->search}}">
            <button class="search-department-submit" type="submit">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5005 14H14.7105L14.4305 13.73C15.0554 13.0039 15.5122 12.1487 15.768 11.2256C16.0239 10.3024 16.0725 9.33413 15.9105 8.38998C15.4405 5.60998 13.1205 3.38997 10.3205 3.04997C9.33608 2.92544 8.33625 3.02775 7.39749 3.34906C6.45872 3.67038 5.60591 4.20219 4.90429 4.90381C4.20268 5.60542 3.67087 6.45824 3.34955 7.397C3.02823 8.33576 2.92593 9.33559 3.05046 10.32C3.39046 13.12 5.61046 15.44 8.39046 15.91C9.33462 16.072 10.3029 16.0234 11.2261 15.7675C12.1492 15.5117 13.0044 15.0549 13.7305 14.43L14.0005 14.71V15.5L18.2505 19.75C18.6605 20.16 19.3305 20.16 19.7405 19.75C20.1505 19.34 20.1505 18.67 19.7405 18.26L15.5005 14ZM9.50046 14C7.01046 14 5.00046 11.99 5.00046 9.49997C5.00046 7.00997 7.01046 4.99997 9.50046 4.99997C11.9905 4.99997 14.0005 7.00997 14.0005 9.49997C14.0005 11.99 11.9905 14 9.50046 14Z" fill="#3D8E86"/>
                </svg>
            </button>
        </form>
    </div>
    <div class="department-boxes">

        @foreach ($departments as $department)
        <a href="{{route('showDepartment', ['language'=>app()->getLocale(),'slug'=>$department->slug])}} " class="department-box">
            <div class="icon">
                <img src="{{asset($department?->icon)}}" alt="">
            </div>
            <p>{{$department?->title}}</p>
        </a>
        @endforeach


    </div>
    <div class="pagination">
       <!-- Previous Page Link -->
        @if ($departments->currentPage() > 1)
            <a href="{{ $departments->previousPageUrl() }}" class="prev">
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
            @for ($i = 1; $i <= $departments->lastPage(); $i++)
                <a href="{{ $departments->url($i) }}" class="pagination-item {{ $i == $departments->currentPage() ? 'active' : '' }}">

                </a>
            @endfor
        </div>

        <!-- Next Page Link -->
        @if ($departments->hasMorePages())
            <a href="{{ $departments->nextPageUrl() }}" class="next">
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
    {{-- <div class="pagination">
        @if ($departments->currentPage() > 1)
            <!-- Previous Page Link -->
            <a href="{{ $departments->previousPageUrl() }}" class="prev">Prev</a>
        @else
            <span class="prev disabled">Prev</span>
        @endif

        @foreach ($departments as $department)
            <span>{{ $department->title }}</span>
        @endforeach

        @if ($departments->hasMorePages())
            <!-- Next Page Link -->
            <a href="{{ $departments->nextPageUrl() }}" class="next">Next</a>
        @else
            <span class="next disabled">Next</span>
        @endif
    </div> --}}

</div>
@endsection
