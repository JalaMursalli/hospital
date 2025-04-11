@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.checkups.checkup-banner')
    <div class="checkup-container">
        <div class="checkup-search-container">
            <select id="option_item">
                <option value="">Hamısı</option>
                <option value="discount" {{ request('type') == 'discount' ? 'selected' : '' }} >Endirimli</option>
                <option value="non_discount" {{ request('type') == 'non_discount' ? 'selected' : '' }} >Endirimsiz</option>
            </select>
            <form class="checkup-search">
                <input type="hidden" id="type" name="type" value="{{ request('type') }}">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{$settings['checkupSearch']}}">
                <button type="submit" class="submitCheckupSearch">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.4995 14H14.7095L14.4295 13.73C15.0544 13.0039 15.5112 12.1487 15.767 11.2256C16.0229 10.3024 16.0715 9.33413 15.9095 8.38998C15.4395 5.60998 13.1195 3.38997 10.3195 3.04997C9.3351 2.92544 8.33527 3.02775 7.39651 3.34906C6.45775 3.67038 5.60493 4.20219 4.90332 4.90381C4.20171 5.60542 3.66989 6.45824 3.34858 7.397C3.02726 8.33576 2.92495 9.33559 3.04949 10.32C3.38949 13.12 5.60949 15.44 8.38949 15.91C9.33364 16.072 10.3019 16.0234 11.2251 15.7675C12.1483 15.5117 13.0035 15.0549 13.7295 14.43L13.9995 14.71V15.5L18.2495 19.75C18.6595 20.16 19.3295 20.16 19.7395 19.75C20.1495 19.34 20.1495 18.67 19.7395 18.26L15.4995 14ZM9.49949 14C7.00949 14 4.99949 11.99 4.99949 9.49997C4.99949 7.00997 7.00949 4.99997 9.49949 4.99997C11.9895 4.99997 13.9995 7.00997 13.9995 9.49997C13.9995 11.99 11.9895 14 9.49949 14Z"
                            fill="#3D8E86" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="all-checkups">
            @foreach ($checkups as $checkup)
                <div class="checkup-item">
                    <div class="item-img">
                        <img src="{{ $checkup?->image1 }}" alt="">
                    </div>
                    <div class="item-body">
                        <h2>
                            {{ $checkup?->title }}
                        </h2>
                        <div class="short-desc">
                            <p>{{ strip_tags($checkup?->description) }}</p>
                        </div>
                    </div>
                    <div class="price">
                        {{ $checkup?->price }}
                        <img src="{{ asset('frontend/assets/icons/manatIcon.svg') }}" alt="">
                    </div>
                </div>
            @endforeach

        </div>
        <div class="pagination">
            <!-- Previous Page Link -->
            @if ($checkups->currentPage() > 1)
                <a href="{{ $checkups->previousPageUrl() }}" class="prev">
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
                @for ($i = 1; $i <= $checkups->lastPage(); $i++)
                    <a href="{{ $checkups->url($i) }}" class="pagination-item {{ $i == $checkups->currentPage() ? 'active' : '' }}">

                    </a>
                @endfor
            </div>

            <!-- Next Page Link -->
            @if ($checkups->hasMorePages())
                <a href="{{ $checkups->nextPageUrl() }}" class="next">
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

@push('js')
    <script>
        $('#option_item').on('change',function(){
            let type_value = $(this).val();
            $('#type').val(type_value);
        });
    </script>
@endpush
