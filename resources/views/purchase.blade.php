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
    <link href="{{ asset('css/customcss/customcss.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    @livewireStyles
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
<body class=" font-poppins overflow-auto sm:overflow-hidden h-screen m-0"  >
@auth
        <div  class="h-full bg-transparent w-full" id="app">
              @livewire('purchase',['product'=>$product])
        </div>
@endauth

@livewireScripts
@include('sweetalert::alert')
 @stack('scripts')
</body>
</html>
