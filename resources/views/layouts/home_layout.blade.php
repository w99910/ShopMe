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
<body class=" font-poppins h-0 max-h-screen min-h-screen overflow-hidden bg-cover "  >
@auth
    <div id="app" class="flex">
        <header class="flex flex-col bg-background h-screen justify-between items-center rounded-tr-custom text-white w-2/12" x-data="{isShow:false}">
            <div class="flex flex-col mx-8">


                    <img src="{{url('storage/product.gaming_room.png')}}" class="inline object-cover w-12 h-12 rounded-full object-center visible self-end mt-5" alt="image1" >



            <nav class="flex flex-col mx-auto flex mt-8 ">

                <ul>
                    <li class="flex items-center justify-start py-5 cursor-pointer" x-on:click="window.livewire.emit('refresh')"><img src="{{asset('images/browser.png')}}" alt="image" class="w-2/12 h-auto  mr-3"/> Home</li>

                    <li class="flex items-center justify-start py-5 cursor-pointer" x-on:click="window.livewire.emit('new')"><img src="{{asset('images/new.png')}}" alt="image" class="w-2/12 h-auto  mr-3"/> Newest</li>
                    <li class="flex items-center justify-start py-5 cursor-pointer"><img src="{{asset('images/fire.png')}}" alt="image" class="w-2/12 h-auto mr-3"/>Best Sellers </li>
                    <li class="flex items-center justify-start py-5 cursor-pointer"><img src="{{asset('images/shopping-bag.png')}}" alt="image" class="w-2/12 h-auto mr-3"/>Your choice </li>
                    <li class="flex items-center justify-start py-5 cursor-pointer"><img src="{{asset('images/sale.png')}}" alt="image" class="w-2/12 h-auto mr-3"/>Discount </li>

                </ul>
            </nav>
            </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" flex items-center justify-start  pointer-cursor py-5">
                @csrf<i class="fas fa-sign-out-alt pr-2"></i> <button type="submit" class="focus:outline-none">Logout</button>
            </form>
        </header>
    <div  class="h-screen bg-transparent flex justify-center items-center w-full" id="app">

        <div class="w-full bg-white items-center flex justify-center h-full">

            @yield('content')

        </div>

    </div>
    </div>
@endauth

@livewireScripts
@include('sweetalert::alert')

</body>
</html>
