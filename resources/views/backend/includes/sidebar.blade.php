 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        {{-- <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">Julia Hudda</h4>
                <span class="text-muted"><i
                        class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div> --}}

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span
                            class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>SEO</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.home-seo.index')}}">Ana səhifə</a></li>
                         <li><a href="{{route('backend.doctor-seo.index')}}">Həkimlər</a></li>
                         <li><a href="{{route('backend.about-seo.index')}}">Haqqımızda</a></li>
                         <li><a href="{{route('backend.contact-seo.index')}}">Əlaqə</a></li>
                         <li><a href="{{route('backend.seminar-seo.index')}}">Seminarlar</a></li>
                         <li><a href="{{route('backend.department-seo.index')}}">Şöbələr</a></li>
                         <li><a href="{{route('backend.blog-seo.index')}}">Bloqlar</a></li>
                         <li><a href="{{route('backend.lab-seo.index')}}">Laboratoriya</a></li>
                         <li><a href="{{route('backend.checkup-seo.index')}}">Checkup</a></li>
                         <li><a href="{{route('backend.career-seo.index')}}">Karyera</a></li>
                         <li><a href="{{route('backend.e-hekim-seo.index')}}">E həkim</a></li>
                         <li><a href="{{route('backend.emergency-seo.index')}}">Təcili Yardım</a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{route('backend.translation.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Tərcümələr</span>
                </a></li>
                <li>
                    <a href="{{route('backend.home-banner.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Əsas Səhifə</span>
                </a></li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-layout-3-line"></i>
                            <span>Şöbələr</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                             <li><a href="{{route('backend.department-banner.index')}}">Banner</a></li>
                             {{-- <li><a href="{{route('backend.department-category.index')}}">Kateqoriya</a></li> --}}
                             <li><a href="{{route('backend.department.index')}}">Şöbələr</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-layout-3-line"></i>
                            <span>Cərrahiyyə</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                             <li><a href="{{route('backend.surgery-banner.index')}}">Banner</a></li>
                             {{-- <li><a href="{{route('backend.department-category.index')}}">Kateqoriya</a></li> --}}
                             <li><a href="{{route('backend.surgery.index')}}">Cərrahiyyə</a></li>
                        </ul>
                    </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Həkimlər</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.doctor-banner.index')}}">Banner</a></li>
                         <li><a href="{{route('backend.doctor.index')}}">Həkim</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Haqqımızda</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.about-banner.index')}}">Banner</a></li>
                         <li><a href="{{route('backend.about-us.index')}}">Biz Kimik</a></li>
                         <li><a href="{{route('backend.advantage.index')}}">Üstünlüklərimiz</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('backend.partner.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Partnyorlar</span>
                </a></li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Əlaqə</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.contact-banner.index')}}">Banner</a></li>
                         <li><a href="{{route('backend.contact-us.index')}}">Bizimlə Əlaqə</a></li>
                         <li><a href="{{route('backend.contact.index')}}">Contact icon</a></li>
                         <li><a href="{{route('backend.contact-apply.index')}}">Müraciətlər</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Seminarlar</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.seminar-banner.index')}}">Banner</a></li>
                         <li><a href="{{route('backend.seminar.index')}}">Seminar</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Bloqlar</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.blog-banner.index')}}">Banner</a></li>
                         <li><a href="{{route('backend.blog.index')}}">Bloglar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Laboratoriya</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.service-category.index')}}">Kateqoriya</a></li>
                         <li><a href="{{route('backend.service.index')}}">Xidmətlər</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Checkup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.checkup-banner.index')}}">Banner</a></li>
                         <li><a href="{{route('backend.checkup.index')}}">Paketlər</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Karyera</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.career-banner.index')}}">Banner</a></li>
                         <li><a href="{{route('backend.career.index')}}">Vakansiyalar</a></li>
                         <li><a href="{{route('backend.vacancy.index')}}">Vakansiya tipi</a></li>
                         <li><a href="{{route('backend.apply.index')}}">Müraciətlər</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>E hekim</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.e-hekim.index')}}">E hekim</a></li>
                         <li><a href="{{route('backend.ehekim-apply.index')}}">Müraciətlər</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('backend.social.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Social Linklər</span>
                </a></li>
                <li>
                    <a href="{{route('backend.emergency.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Təcili Yardım</span>
                </a></li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Footer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.footer-logo.index')}}">Logo</a></li>
                         {{-- <li><a href="{{route('backend.checkup.index')}}">Paketlər</a></li> --}}
                    </ul>
                </li>
              </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
