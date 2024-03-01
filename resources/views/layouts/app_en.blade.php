<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','عيادة ')</title>

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="">
    {{--
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}


    <link href="{{asset('assets/fonts/css.css')}}" rel='stylesheet'>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}



    <!-- Favicon Icon -->
    <link rel="icon" href=" {{asset('storage/'.$appSettingEn->icon)}}" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/lightgallery.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/jQueryUi.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/textRotate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/elemnts/rtl.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/elemnts/myrtl.css')}}" />

    @livewireStyles
</head>

<body style="font-family: 'Tajawal';font-size: 20px;">




    <div class="st-content py-4">
        @yield('content')
    </div>

    <livewire:en.setting.footer :team_id="$team_id" />
    {{-- @include('layouts.inc.en.footer') --}}
    {{--
    </div> --}}

    <!-- Scripts -->
    <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkg.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slick.min.js')}}"></script>
    <script src="{{asset('assets/js/mailchimp.min.js')}}"></script>
    <script src="{{asset('assets/js/counter.min.js')}}"></script>
    <script src="{{asset('assets/js/lightgallery.min.js')}}"></script>
    <script src="{{asset('assets/js/ripples.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/jQueryUi.js')}}"></script>
    <script src="{{asset('assets/js/textRotate.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    @livewireScripts
</body>


</html>