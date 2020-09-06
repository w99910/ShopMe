<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

        }
    </style>
</head>
<body class="font-poppins">
<header class="flex bg-gray-300 flex-col h-screen w-1/6 justify-start px-3">
<nav>
    <ul>
        <li class="flex items-center justify-start py-5"><i class="fas fa-home px-2"></i> <a href="#">Home</a></li>
        <li class="flex items-center justify-start py-5"><i class="fas fa-users px-2"></i><a href="#">Products</a></li>
        <li class="flex items-center justify-start py-5"><i class="fas fa-th-list px-2"></i><a href="#">Users</a></li>

    </ul>
</nav>
</header>
</body>
</html>
