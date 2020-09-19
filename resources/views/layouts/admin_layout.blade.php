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
    <link href="{{asset('css/customcss/customcss.css')}}" rel="stylesheet">
    @livewireStyles

{{--    style="background-image: url('{{asset('images/admin-bg.jpg')}}')"--}}
</head>
<body class=" font-poppins h-0 max-h-screen min-h-screen overflow-hidden bg-cover "  >
@auth
    <div id="app" class="flex">
    <header class="flex flex-col bg-gray-300 h-screen justify-between items-center px-10 ">
        <nav class="flex flex-col mx-auto flex ">

            <ul>
                <li ><a href="{{route('admin_home')}}"  class="flex items-center justify-start py-5 cursor-pointer"><i class="fas fa-home px-2"></i>DashBoard</a></li>
                <li ><a href="{{route('page.user')}}"   class="flex items-center justify-start py-5 cursor-pointer" ><i class="fas fa-users px-2"></i>Users</a> </li>
                <li ><a href="{{route('page.product')}}" class="flex items-center justify-start py-5 cursor-pointer" ><i class="fas fa-th-list px-2"></i>Products</a> </li>

            </ul>
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" flex items-center justify-start  pointer-cursor py-5">
            @csrf<i class="fas fa-sign-out-alt pr-2"></i> <button type="submit" class="focus:outline-none">Logout</button>
        </form>
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
    @stack('scripts')
    <script src="{{asset('js/custom_js/custom_js.js')}}" ></script>
</body>
</html>
