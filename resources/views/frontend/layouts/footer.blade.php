<footer>
    <div class="footer-main">
        <div class="footer-left">
            <a href="{{route('home')}}" class="footer-logo">
                <img src="{{$footer->image}}" alt="">
            </a>
            <h2 class="footerTitle">{{$footer->title}}</h2>
            <div class="short-desc">
                <p>{{$footer->sub_title}}</p>
            </div>
        </div>
        <div class="footer-sections">
            <div class="footer-section">
                <h3 class="sectionTitle">Quick Links</h3>
                <div class="section-links">
                    <a href="{{route('home')}}" class="section-link">{{$settings['home']}}</a>
                    <a href="{{route('about')}}" class="section-link">{{$settings['about']}}</a>
                    <a href="{{route('department')}}" class="section-link">{{$settings['department']}}</a>
                    <a href="{{route('blog')}}" class="section-link">{{$settings['blog']}}</a>
                    <a href="{{route('doctor')}}" class="section-link">{{$settings['doctor']}}</a>
                    <a href="{{route('contact')}}" class="section-link">{{$settings['contact']}}</a>
                </div>
            </div>
            <div class="footer-section">
                <h3 class="sectionTitle">Şöbələr</h3>
                <div class="section-links">
                    @foreach ( $all_departments as $department)
                    <a href="{{route('showDepartment', ['language'=>app()->getLocale(),'slug'=>$department->slug])}}" class="section-link">{{$department->title}}</a>
                    @endforeach


                    {{-- <a href="departments-detail.html" class="section-link">Analiz</a>
                    <a href="departments-detail.html" class="section-link">Stomotologiya</a>
                    <a href="departments-detail.html" class="section-link">Urologiya</a>
                    <a href="departments-detail.html" class="section-link">Nevrologiya</a>
                    <a href="departments-detail.html" class="section-link">Reanimasiya</a> --}}
                </div>
            </div>
            <div class="footer-contact">
                <h3 class="contactTitle">Əlaqə</h3>
                <div class="contact-links">
                    <a href="" class="hotline">{{$contact->phone_title2}}</a>
                    <a href="" class="contact-link">
                        <img src="{{$contact->address_icon}}" alt="">
                        {{$contact->address_title}}
                    </a>
                    <a href="" class="contact-link">
                        <img src="{{$contact->email_icon}}" alt="">
                        {{$contact->email_title}}
                    </a>
                    <a href="" class="contact-link">
                        <img src="{{$contact->phone_icon}}" alt="">
                        {{$contact->phone_title}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="socials">
            @foreach ( $socials as $social)
            <a href="{{$social->url}}" class="social-item">
                <img src="{{$social->icon}}" alt="">
            </a>
            @endforeach

        </div>
        <div class="footer-bottom-text">
            <p>{{$settings['copyright']}}  <a href="https://166tech.az/">166Tech</a></p>
        </div>
    </div>
</footer>
