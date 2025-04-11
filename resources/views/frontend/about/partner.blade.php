<div class="partners-slide-container">
        <div class="partners-slide swiper">
            <div class="swiper-wrapper">
                @foreach ( $partners  as  $partner)
                <div class="partner-item swiper-slide">
                    <img src="{{$partner?->image}}" alt="">
                </div>
                @endforeach


            </div>
        </div>
    </div>

