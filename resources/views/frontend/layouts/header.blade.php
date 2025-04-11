<header>
    <div class="header-container">
        <div class="header-contacts">
            <a href="" class="header-contact-item">
                <img src="{{$contact->address_icon}}" alt="">
                <p>{{$contact->address_title}}</p>
            </a>
            <a href="" class="header-contact-item">
                <img src="{{$contact->email_icon}}" alt="">
                <p>{{$contact->email_title}}</p>
            </a>
            <a href="" class="header-contact-item">
                <img src="{{$contact->phone_icon}}" alt="">
                <p>{{$contact->phone_title}}</p>
            </a>
        </div>
        <div class="header-right">
            <div class="socials">
                @foreach ( $socials as $social)
                <a href="{{$social->url}}" class="social-item">
                    <img src="{{$social->icon}}" alt="">
                </a>
                @endforeach


            </div>
            <a href="" class="phone">{{$contact->phone_title2}}</a>
        </div>
    </div>
</header>
