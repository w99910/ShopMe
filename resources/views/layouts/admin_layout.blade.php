<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Commerce') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{asset('css/customcss/customcss.css')}}" rel="stylesheet">
    @livewireStyles
    <style>
        @media only screen and (min-width: 640px){
            .nav{
             display: flex;

            }
        }
    </style>
{{--    style="background-image: url('{{asset('images/admin-bg.jpg')}}')"--}}
</head>
<body class=" font-poppins h-0 max-h-screen min-h-screen overflow-auto sm:overflow-hidden bg-cover "  >
@auth
{{--    <header>--}}
{{--        --}}
{{--    </header>--}}
    <div class="flex flex-col sm:flex-row">
    <header class="absolute top-0 left-0 w-full z-50 sm:relative sm:w-auto flex flex-col bg-gray-300 sm:h-screen justify-between items-center px-3 py-1 sm:px-10" x-data="{isOpen:true}">
        <div class="flex py-2 items-center w-full justify-start sm:hidden" x-on:click="isOpen = !isOpen"><i class="fa fa-bars"></i> </div>
        <nav class="flex flex-col mx-auto flex nav" :class="{'hidden':isOpen}">
            <ul>
                <li ><a href="{{route('admin_home')}}"  class="flex items-center justify-start py-5 cursor-pointer"><i class="fas fa-home px-2"></i>DashBoard</a></li>
                <li ><a href="{{route('page.user')}}"   class="flex items-center justify-start py-5 cursor-pointer" ><i class="fas fa-users px-2"></i>Users</a> </li>
                <li ><a href="{{route('page.product')}}" class="flex items-center justify-start py-5 cursor-pointer" ><i class="fas fa-th-list px-2"></i>Products</a> </li>
                <li> <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" flex items-center justify-start  cursor-pointer py-5">
                        @csrf<i class="fas fa-sign-out-alt px-2"></i> <button type="submit" class="focus:outline-none">Logout</button>
                    </form></li>
            </ul>
        </nav>

    </header>
@endauth
<div  class="h-screen bg-transparent flex justify-center items-center w-full">
    <div class="w-full bg-white items-center flex justify-center h-full">
        @yield('content')

    </div>
</div>
    </div>
    @include('sweetalert::alert')
@livewireScripts
{{--    @stack('scripts')--}}
      <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/custom_js/custom_js.js')}}" ></script>
</body>
</html>
