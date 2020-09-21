<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
{{--    @livewireStyles--}}
    <style>
        input#menu-toggle:checked ~ #menu {
            display: block;

        }
        @media only screen and (max-width: 640px) {
            div#menu{
                display: none;
            }
           div#png1{
               display:none;
           }

        }
    </style>
</head>
<body class="font-poppins h-0 max-h-screen min-h-screen overflow-hidden">
<div class="bg-background h-full flex justify-center items-center">
@guest
        <main class="h-full flex py-24 w-8/12 relative items-center">
                        @yield('content')
        </main>
        @endguest
@auth
        <main class="h-full flex py-24 w-8/12 relative items-center">

            @yield('2fa')

        </main>
    @endauth
    </div>
    @livewireScripts
@include('sweetalert::alert')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<script>
    // const tl = gsap.timeline({defaults: {duration: .7, ease: Back.easeOut.config(2), opacity: 0}});
    const tl = gsap.timeline({ defaults:{ duration:2.5,delay:1 , ease:"none" } });

    tl.to('.image',{y:"16",repeat:-1,yoyo:true})

</script>
</body>
</html>
