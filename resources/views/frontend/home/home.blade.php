<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/swiper/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/jquery-nice-select-1.1.0/css/nice-select.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/indexStyle/index.css') }}">
</head>

<body>
    <div class="home-container">
        <img src="{{ $homeBanner?->image }}" alt="" class="homeBg">
        <div class="header">
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
        <div class="home-menu">
            <div class="menu-slide">
                <div class="menuItem">
                    <div class="menuItem-inner">
                        <p id="menuDepartments">{{ $settings['department'] }}</p>
                    </div>
                </div>
                <div class="menuItem">
                    <div class="menuItem-inner" id="">
                        <p id="menuDiagnostics">{{ $settings['diagnostics'] }}</p>
                    </div>
                </div>
                <div class="menuItem">
                    <button class="menu-prev" type="button">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.5573 11.0573C15.8074 10.8073 16.1464 10.6669 16.5 10.6669C16.8535 10.6669 17.1926 10.8073 17.4427 11.0573L24.9853 18.5999C25.1127 18.7229 25.2143 18.8701 25.2841 19.0327C25.354 19.1954 25.3908 19.3704 25.3923 19.5474C25.3939 19.7245 25.3601 19.9 25.2931 20.0639C25.2261 20.2277 25.127 20.3766 25.0019 20.5018C24.8767 20.627 24.7278 20.726 24.5639 20.793C24.4001 20.8601 24.2245 20.8938 24.0475 20.8923C23.8704 20.8907 23.6955 20.854 23.5328 20.7841C23.3701 20.7142 23.223 20.6126 23.1 20.4853L16.5 13.8853L9.9 20.4853C9.64853 20.7282 9.31172 20.8626 8.96213 20.8595C8.61253 20.8565 8.27812 20.7163 8.0309 20.469C7.78369 20.2218 7.64347 19.8874 7.64043 19.5378C7.63739 19.1882 7.77179 18.8514 8.01466 18.5999L15.5573 11.0573Z"
                                fill="white" />
                        </svg>
                    </button>
                    <div class="menuItem-inner">
                        <p id="menuHome">{{ $settings['home'] }}</p>
                    </div>
                    <button class="menu-next" type="button">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_127_6615)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.4427 20.9427C17.1926 21.1927 16.8536 21.3331 16.5 21.3331C16.1465 21.3331 15.8074 21.1927 15.5573 20.9427L8.01467 13.4C7.88732 13.2771 7.78575 13.1299 7.71587 12.9673C7.64599 12.8046 7.60921 12.6296 7.60767 12.4526C7.60613 12.2755 7.63987 12.1 7.70691 11.9361C7.77395 11.7722 7.87295 11.6234 7.99814 11.4982C8.12333 11.373 8.2722 11.274 8.43606 11.207C8.59993 11.1399 8.7755 11.1062 8.95254 11.1077C9.12958 11.1093 9.30454 11.146 9.46721 11.2159C9.62988 11.2858 9.77701 11.3874 9.9 11.5147L16.5 18.1147L23.1 11.5147C23.3515 11.2718 23.6883 11.1374 24.0379 11.1405C24.3875 11.1435 24.7219 11.2837 24.9691 11.531C25.2163 11.7782 25.3565 12.1126 25.3596 12.4622C25.3626 12.8118 25.2282 13.1486 24.9853 13.4001L17.4427 20.9427Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_127_6615">
                                    <rect width="32" height="32" fill="white"
                                        transform="translate(32.5) rotate(90)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
                <div class="menuItem">
                    <div class="menuItem-inner">
                        <p id="menuSurgery">{{ $settings['surgery'] }}</p>
                    </div>
                </div>
                <div class="menuItem">
                    <div class="menuItem-inner" id="">
                        <p id="menuLaboratory">{{ $settings['lab'] }}</p>
                    </div>
                </div>
            </div>
            <div class="menu-right">
                <div class="menu-boxes" data-id="menuDepartments">
                    @foreach ($departments as $department)
                        <a href="{{ route('showDepartment', ['language' => app()->getLocale(), 'slug' => $department->slug]) }}"
                            class="menu-box">
                            <p>{{ $department?->title }}</p>
                        </a>
                    @endforeach


                </div>
                <div class="menu-boxes" data-id="menuDiagnostics">
                    @foreach ($diagnostics as $diagnostic)
                        <a href="{{ route('lab', ['language' => app()->getLocale(), 'category_id' => $diagnostic->id]) }}"
                            class="menu-box">
                            <p>{{ $diagnostic->title }}</p>
                        </a>
                    @endforeach


                </div>
                <div class="menu-boxes" data-id="menuHome">
                    <a href="{{ route('doctor') }}" class="menu-box">
                        <p>{{ $settings['doctors'] }}</p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/doctorIcon.svg') }}" alt="">
                        </div>
                    </a>
                    <a href="{{ route('department') }}" class="menu-box">
                        <p>{{ $settings['department'] }}</p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/sobeIcon.svg') }}" alt="">
                        </div>
                    </a>
                    <a href="{{ route('lab') }}" class="menu-box">
                        <p>{{ $settings['diagnostics'] }}</p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/diagnostikaIcon.svg') }}" alt="">.
                        </div>
                    </a>
                    <a href="{{ route('lab') }}" class="menu-box">
                        <p>Lab</p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/laboratoriyaIcon.svg') }}" alt="">
                        </div>
                    </a>
                    <a href="" class="menu-box">
                        <p>{{ $settings['polyclinic'] }} </p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/poliklinikaIcon.svg') }}" alt="">
                        </div>
                    </a>

                    <a href="{{ route('seminar') }}" class="menu-box">
                        <p>{{$settings['seminar'] }}</p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/seminarIcon.svg') }}" alt="">
                        </div>
                    </a>
                    <a href="{{ route('blog') }}" class="menu-box">
                        <p>{{$settings['blog'] }}</p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/blogIcon.svg') }}" alt="">
                        </div>
                    </a>
                    <a href="{{ route('career') }}" class="menu-box">
                        <p>{{$settings['career'] }}</p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/karyeraIcon.svg') }}" alt="">
                        </div>
                    </a>
                    <a href="{{ route('checkup') }}" class="menu-box">
                        <p>{{$settings['checkup'] }}</p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/checkUpIcon.svg') }}" alt="">
                        </div>
                    </a>
                    <a href="{{route('e-hekim')}}" class="menu-box">
                        <p>{{$settings['ehekim'] }}</p>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/icons/eDoctorIcon.svg') }}" alt="">
                        </div>
                    </a>

                </div>
                <div class="menu-boxes" data-id="menuSurgery">
                    @foreach ($surgeries as $surgery)
                        <a href="{{ route('showSurgery', ['language' => app()->getLocale(), 'slug' => $surgery->slug]) }}"
                            class="menu-box">
                            <p>{{ $surgery?->title }}</p>
                        </a>
                    @endforeach


                </div>
                <div class="menu-boxes" data-id="menuLaboratory">
                    @foreach ($labs as $lab)
                        <a href="" class="menu-box">
                            <p>{{ $lab->title }}</p>
                        </a>
                    @endforeach


                </div>
                <div class="menuMain-links">
                    <a href="{{ route('emergency') }}" class="menuMain-linkItem">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.7501 21V15.05L5.6001 18.025L3.8501 15L9.0001 12L3.8501 9.025L5.6001 6L10.7501 8.975V3H14.2501V8.975L19.4001 6L21.1501 9.025L16.0001 12L21.1501 15L19.4001 18.025L14.2501 15.05V21H10.7501Z"
                                fill="white" />
                        </svg>
                        <p>{{$settings['emerngecnyH'] }}</p>
                    </a>
                    <a href="{{ route('contact') }}" class="menuMain-linkItem">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.5 19H5.5V8H19.5M16.5 1V3H8.5V1H6.5V3H5.5C4.39 3 3.5 3.89 3.5 5V19C3.5 19.5304 3.71071 20.0391 4.08579 20.4142C4.46086 20.7893 4.96957 21 5.5 21H19.5C20.0304 21 20.5391 20.7893 20.9142 20.4142C21.2893 20.0391 21.5 19.5304 21.5 19V5C21.5 4.46957 21.2893 3.96086 20.9142 3.58579C20.5391 3.21071 20.0304 3 19.5 3H18.5V1M17.5 12H12.5V17H17.5V12Z"
                                fill="white" />
                        </svg>
                        <p>{{$settings['onlineQueue'] }}</p>
                    </a>
                    <a href="{{ route('contact') }}" class="menuMain-linkItem">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.5 10C20.5 14.993 14.961 20.193 13.101 21.799C12.9277 21.9293 12.7168 21.9998 12.5 21.9998C12.2832 21.9998 12.0723 21.9293 11.899 21.799C10.039 20.193 4.5 14.993 4.5 10C4.5 7.87827 5.34285 5.84344 6.84315 4.34315C8.34344 2.84285 10.3783 2 12.5 2C14.6217 2 16.6566 2.84285 18.1569 4.34315C19.6571 5.84344 20.5 7.87827 20.5 10Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.5 13C14.1569 13 15.5 11.6569 15.5 10C15.5 8.34315 14.1569 7 12.5 7C10.8431 7 9.5 8.34315 9.5 10C9.5 11.6569 10.8431 13 12.5 13Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>{{$settings['contact'] }}</p>

                    </a>
                </div>
            </div>
        </div>
        <div class="home-bottom">
            <p class="copyRight">{{ $settings['copyright'] }} <a href="https://166tech.az/">166Tech</a></p>
            <div class="home-bottom-links">
                <div class="socials">
                    @foreach ($socials as $social)
                        <a href="{{ $social->url }}" class="social-item">
                            <img src="{{ $social->icon }}" alt="">
                        </a>
                        @endforeach
                </div>

                <a href="" class="phone">{{ $contact->phone_title2 }}</a>
            </div>
        </div>
    </div>
    @include('frontend.layouts.menu')
    {{-- // <div class="aside-menu-container">
    //     <div class="aside-menu-top">
    //         <div class="header-lang">
    //             <button class="current-lang" type="button">
    //                 Az
    //                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    //                     <path d="M7 10L12 15L17 10H7Z" fill="white"/>
    //                 </svg>
    //             </button>
    //             <div class="other-langs">
    //                 <a href="" class="other-lang-item">En</a>
    //                 <a href="" class="other-lang-item">Ru</a>
    //             </div>
    //         </div>
    //         <button class="closeMenu" type="button">
    //             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    //                 <path d="M18.36 19.78L12 13.41L5.63997 19.78L4.21997 18.36L10.59 12L4.21997 5.63997L5.63997 4.21997L12 10.59L18.36 4.22997L19.77 5.63997L13.41 12L19.77 18.36L18.36 19.78Z" fill="#243352"/>
    //             </svg>
    //         </button>
    //     </div>
    //     <div class="aside-menu">
    //         <a href="index.html" class="aside-link">Əsas səhifə</a>
    //         <a href="about.html" class="aside-link">Haqqımızda</a>
    //         <a href="doctors.html" class="aside-link">Həkimlər</a>
    //         <a href="departments.html" class="aside-link">Şöbələr</a>
    //         <a href="blog.html" class="aside-link">Blog</a>
    //         <a href="contact.html" class="aside-link">Əlaqə</a>
    //     </div>
    //     <div class="aside-menu-bottom">
    //         <div class="socials">
    //             <a href="" class="social-item">
    //                 <img src="./assets/icons/fb-white.svg" alt="">
    //             </a>
    //             <a href="" class="social-item">
    //                 <img src="./assets/icons/insta-white.svg" alt="">
    //             </a>
    //             <a href="" class="social-item">
    //                 <img src="./assets/icons/youtube-white.svg" alt="">
    //             </a>
    //             <a href="" class="social-item">
    //                 <img src="./assets/icons/linkedin-white.svg" alt="">
    //             </a>
    //         </div>
    //         <a href="" class="phone">*7606</a>
    //     </div>
    // </div> --}}

    <script src="{{ asset('frontend/assets/jquery-nice-select-1.1.0/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select').niceSelect()
        })
    </script>
    <script src="{{ asset('frontend/assets/swiper/swiper.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/index.js') }}"></script>
</body>

</html>
