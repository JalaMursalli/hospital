
    <div class="doctors-slide-container">
        <h2>{{$settings['doctor']}}</h2>
        <div class="doctors-slide swiper">
            <div class="swiper-wrapper">
                @foreach ( $doctors as $doctor)
                <a href="{{route('showDoctor', ['language'=>app()->getLocale(),'slug'=>$doctor->slug])}}" class="doctor-card swiper-slide">
                    <div class="doctorImg">
                        <img src="{{asset($doctor?->image)}}" alt="">
                    </div>
                    <div class="cardBody">
                        <div class="cardMain">
                            <h3 class="drName">{{$doctor?->name}}</h3>
                            <p class="drPosition">{{$doctor?->position}}</p>
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

