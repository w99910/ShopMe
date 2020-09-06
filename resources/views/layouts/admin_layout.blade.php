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
{{--    style="background-image: url('{{asset('images/admin-bg.jpg')}}')"--}}
</head>
<body class=" font-poppins h-0 max-h-screen min-h-screen overflow-hidden bg-cover "  >
@auth
    <div id="app" class="flex" x-data="{open1:true,open2:false,open3:false}">
    <header class="flex flex-col bg-gray-300 h-screen justify-between items-center px-10 ">
        <nav>
            <ul>
                <li class="flex items-center justify-start py-5 cursor-pointer " x-on:click="{open1 = true, open2 = false , open3=false}" ><i class="fas fa-home px-2"></i>Home</li>
                <li class="flex items-center justify-start py-5 cursor-pointer" x-on:click="{open1 = false, open2 = true , open3=false}"><i class="fas fa-users px-2"></i>Users</li>
                <li class="flex items-center justify-start py-5 cursor-pointer" x-on:click="{open1 = false, open2 = false , open3=true}"><i class="fas fa-th-list px-2"></i>Products</li>

            </ul>
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" flex items-center justify-start  pointer-cursor py-5">
            @csrf<i class="fas fa-sign-out-alt pr-2"></i> <button type="submit" class="focus:outline-none">Logout</button>
        </form>
    </header>
@endauth
<div  class="h-screen bg-transparent flex justify-center items-center w-full">



        @yield('content')



</div>
    </div>
@livewireScripts
</body>
</html>
