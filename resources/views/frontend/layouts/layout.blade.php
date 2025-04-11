<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/swiper/swiper.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/jquery-nice-select-1.1.0/css/nice-select.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/assets/style/style.css')}}">


    <link rel="icon" type="image/png" href="/frontend/assets/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/frontend/assets/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/frontend/assets/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/frontend/assets/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/frontend/assets/favicon/site.webmanifest" />

</head>
<body>
   @include('frontend.layouts.header')
   @include('frontend.layouts.menu')

   @yield('content')

   @include('frontend.layouts.footer')
    <script src="{{asset('frontend/assets/jquery-nice-select-1.1.0/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/assets/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('select').niceSelect()
        })
    </script>
    <script src="{{asset('frontend/assets/swiper/swiper.js')}}"></script>
    <script src="{{asset('frontend/assets/js/index.js')}}"></script>
    @stack("js")
</body>
</html>
