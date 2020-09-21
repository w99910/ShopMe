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
    <style>
       *{
           margin:0;
           padding: 0;
           box-sizing: border-box;
       }
       .hide{
           background: black;
           overflow: hidden;

       }
       .hide span{
           transform: translateY(100%);
           display: inline-block;
       }
       /*main{*/
       /*    font-family: 'Poppins', monospace;*/
       /*}*/
    </style>
</head>
<body class="font-poppins">

<main >
    <div class="landing min-h-screen bg-gray-300 flex justify-center items-center">
         <h1 class="greeting">Hello</h1>
    </div>
</main>
<div class="intro fixed bg-black top-0 left-0 w-full h-full flex justify-center items-center">
      <div class="intro-text text-white text-2xl  flex flex-col">
          <h1 class="hide">
              <span class="text">Hello From E-Commerce</span>
          </h1>
          <h1 class="hide">
              <span class="text">Dear</span>
          </h1>
          <h1 class="hide">
              <span class="text">Aishideru</span>
          </h1>

      </div>
   </div>
<div class="slider h-full w-full bg-alert fixed top-0 left-0 transform translate-y-full"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<script>
    const tl = gsap.timeline({ defaults:{ ease:"power1.out" } });
    tl.to(".text", {y:"0%",duration: 1 , stagger:0.25 ,delay:0.5});
    tl.to('.slider',{y:"-100%",duration:1 ,delay:0.2})
    tl.to('.intro',{y:"-100%", duration:1},'-=1')
     tl.to('.greeting',{x:'50%',duration:1,delay:0.5})
</script>
</body>
</html>
