<div class="aside-menu-container">
        <div class="aside-menu-top">
            <div class="header-lang">
                <button class="current-lang" type="button">
                    Az
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 10L12 15L17 10H7Z" fill="white"/>
                    </svg>
                </button>
                <div class="other-langs">
                    <a href="" class="other-lang-item">En</a>
                    <a href="" class="other-lang-item">Ru</a>
                </div>
            </div>
            <button class="closeMenu" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.36 19.78L12 13.41L5.63997 19.78L4.21997 18.36L10.59 12L4.21997 5.63997L5.63997 4.21997L12 10.59L18.36 4.22997L19.77 5.63997L13.41 12L19.77 18.36L18.36 19.78Z" fill="#243352"/>
                </svg>
            </button>
        </div>
        <div class="aside-menu">
            <a href="{{route('home')}}" class="aside-link">{{$settings['home']}}</a>
            <a href="{{route('about')}}" class="aside-link"> {{$settings['about']}}</a>
            <a href="{{route('doctor')}}" class="aside-link"> {{$settings['doctors']}}</a>
            <a href="{{route('department')}}" class="aside-link"> {{$settings['department']}}</a>
            <a href="{{route('blog')}}" class="aside-link"> {{$settings['blog']}}</a>
            <a href="{{route('contact')}}" class="aside-link"> {{$settings['contact']}}</a>
        </div>
        <div class="aside-menu-bottom">
            <div class="socials">
                @foreach ($socials as $social)
                <a href="{{$social->url}}" class="social-item">
                    <img src="{{$social->icon}}" alt="">
                </a>
                @endforeach


            </div>
            <a href="" class="phone">{{$contact->phone_title2}}</a>
        </div>
     </div>

