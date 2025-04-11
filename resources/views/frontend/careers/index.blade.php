@extends('frontend.layouts.layout')
@section('content')
@include('frontend.careers.career-banner')
@section('title',$settings['career'])
<div class="vacancy-container">
    <div class="vacancy-search-container">
        <select name="" id="option_item">
            <option value="">Hamısı</option>
            @foreach ($categories as $category)
                <option @selected(request()->category_id==$category->id) data-id="{{$category?->id}}" value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <form class="vacancy-search">
            <input type="hidden"  id="category" name="category_id" value="{{ request()->category_id}}">

            <input type="text" placeholder="Vakansiya axtar" name="search" value="{{request()->search}}">
            <button type="submit" class="submitVacancySearch">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.4995 14H14.7095L14.4295 13.73C15.0544 13.0039 15.5112 12.1487 15.767 11.2256C16.0229 10.3024 16.0715 9.33413 15.9095 8.38998C15.4395 5.60998 13.1195 3.38997 10.3195 3.04997C9.3351 2.92544 8.33527 3.02775 7.39651 3.34906C6.45775 3.67038 5.60493 4.20219 4.90332 4.90381C4.20171 5.60542 3.66989 6.45824 3.34858 7.397C3.02726 8.33576 2.92495 9.33559 3.04949 10.32C3.38949 13.12 5.60949 15.44 8.38949 15.91C9.33364 16.072 10.3019 16.0234 11.2251 15.7675C12.1483 15.5117 13.0035 15.0549 13.7295 14.43L13.9995 14.71V15.5L18.2495 19.75C18.6595 20.16 19.3295 20.16 19.7395 19.75C20.1495 19.34 20.1495 18.67 19.7395 18.26L15.4995 14ZM9.49949 14C7.00949 14 4.99949 11.99 4.99949 9.49997C4.99949 7.00997 7.00949 4.99997 9.49949 4.99997C11.9895 4.99997 13.9995 7.00997 13.9995 9.49997C13.9995 11.99 11.9895 14 9.49949 14Z" fill="#3D8E86"/>
                </svg>
            </button>
        </form>
    </div>
    <div class="all-vacancy">
        @foreach ($careers as $career)
        <a href="{{route('showCareer', ['language'=>app()->getLocale(),'slug'=>$career->slug])}} " class="vacancy-item">
            <div class="vacancy-img">
                <img src="{{$career?->image}}" alt="">
            </div>
            <div class="vacancy-body">
                <div class="bodyMain">
                    <div class="bodyMain-left">
                        <h2>{{$career?->title}}</h2>
                        <div class="vacAdress">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5592 8.5599C13.5592 9.44395 13.2081 10.2918 12.5829 10.9169C11.9578 11.542 11.11 11.8932 10.2259 11.8932C9.34186 11.8932 8.49401 11.542 7.86889 10.9169C7.24377 10.2918 6.89258 9.44395 6.89258 8.5599C6.89258 7.67584 7.24377 6.82799 7.86889 6.20287C8.49401 5.57775 9.34186 5.22656 10.2259 5.22656C11.11 5.22656 11.9578 5.57775 12.5829 6.20287C13.2081 6.82799 13.5592 7.67584 13.5592 8.5599ZM11.8926 8.5599C11.8926 9.00192 11.717 9.42585 11.4044 9.73841C11.0919 10.051 10.6679 10.2266 10.2259 10.2266C9.78388 10.2266 9.35996 10.051 9.0474 9.73841C8.73484 9.42585 8.55924 9.00192 8.55924 8.5599C8.55924 8.11787 8.73484 7.69394 9.0474 7.38138C9.35996 7.06882 9.78388 6.89323 10.2259 6.89323C10.6679 6.89323 11.0919 7.06882 11.4044 7.38138C11.717 7.69394 11.8926 8.11787 11.8926 8.5599Z" fill="#BBBBBB"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.82834 13.765C3.75404 12.7421 3.00717 11.4237 2.6822 9.97635C2.35722 8.52902 2.46873 7.01783 3.00262 5.63387C3.53651 4.24992 4.4688 3.05536 5.6816 2.20125C6.8944 1.34715 8.33323 0.871869 9.81615 0.835506C11.2991 0.799144 12.7595 1.20334 14.0127 1.99697C15.2659 2.79061 16.2556 3.93804 16.8567 5.29416C17.4578 6.65029 17.6432 8.1542 17.3895 9.61572C17.1359 11.0772 16.4546 12.4307 15.4317 13.505L10.26 18.9367L4.82834 13.765ZM14.225 12.3558L10.2025 16.5808L5.9775 12.5583C5.14198 11.7628 4.56112 10.7373 4.30838 9.61165C4.05564 8.48597 4.14237 7.31063 4.5576 6.23424C4.97283 5.15786 5.69792 4.22877 6.64117 3.56447C7.58442 2.90017 8.70348 2.53048 9.85683 2.50216C11.0102 2.47385 12.146 2.78817 13.1208 3.40538C14.0955 4.02259 14.8653 4.91497 15.3328 5.96968C15.8004 7.02439 15.9447 8.19406 15.7475 9.33078C15.5503 10.4675 15.0205 11.5202 14.225 12.3558Z" fill="#BBBBBB"/>
                            </svg>
                            <p>{{$career?->address}}</p>
                        </div>
                    </div>
                    <div class="work-time">
                        <p>{{$career?->workHours}}</p>
                    </div>
                </div>
                <div class="vacancy-desc">
                    <p>{{$career?->description1}}</p>
                </div>
            </div>
            <!-- Elan active olmayanda bu gorsensin -->
            @if($career->status == 0)
            <div class="nonActive">{{__('frontend.noactivate')}}</div>
            @endif
        </a>
        @endforeach

    </div>
    <div class="pagination">
        <!-- Previous Page Link -->
        @if ($careers->currentPage() > 1)
            <a href="{{ $careers->previousPageUrl() }}" class="prev">
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
            @for ($i = 1; $i <= $careers->lastPage(); $i++)
                <a href="{{ $careers->url($i) }}" class="pagination-item {{ $i == $careers->currentPage() ? 'active' : '' }}">

                </a>
            @endfor
        </div>

        <!-- Next Page Link -->
        @if ($careers->hasMorePages())
            <a href="{{ $careers->nextPageUrl() }}" class="next">
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


@push("js")

<script>
$("#option_item").change(function(){
    var id = $(this).val();
    $("#category").val(id)
})
</script>

@endpush
