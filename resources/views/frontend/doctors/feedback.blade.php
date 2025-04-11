<div class="customer-review-container">
    <h2 class="customer-review-title">Müştəri <span>Rəyləri</span></h2>
    <div class="customer-review-slide swiper">
        <div class="swiper-wrapper">
            @foreach ($feedbacks as $feedback)
            <div class="customer-review-box swiper-slide">
                <div class="texts">
                    <p>
                        {!!$feedback->description!!}
                    </p>
                </div>
                <div class="box-body">
                   
                    <p class="customer_profession">{{$feedback?->position}}</p>
                    <div class="box-customer">
                        <div class="customerImg">
                            <img src="{{asset($feedback?->image)}}" alt="">
                        </div>
                        <div class="ratings">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>

                </div>
                <img src="{{asset('frontend/assets/images/customerReviewBg.png')}}" alt="" class="reviewBg">
            </div>
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
