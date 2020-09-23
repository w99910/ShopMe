<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
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
           overflow: hidden;

       }
       .hide span{
           transform: translateY(100%);
           display: inline-block;
       }

    </style>
</head>
<body class="font-poppins overflow-hidden">
<main class="customer overflow-hidden absolute min-h-screen min-w-full top-0 left-0">

    <div class="landing min-h-screen bg-gray-300 justify-center items-center flex relative">
        <div class="absolute top-0 right-0 h-full w-1/12 bg-red-600 flex justify-center items-center"><span id="admin-url" class=" transform -rotate-90 block cursor-pointer">Admin</span> </div>
    </div>

</main>
<div class="watchnow transform translate-x-full top-0 right-0 absolute bg-alert min-h-screen min-w-full"></div>

<div class="intro fixed bg-white top-0 left-0 w-full h-full flex justify-center items-center z-20">
      <div class="intro-text text-2xl  flex flex-col">
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
<div class="slider h-full w-full bg-background fixed top-0 left-0 transform translate-y-full z-30"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>
<script>
    const tl = gsap.timeline({ defaults:{ ease:"power1.out" } });
    tl.to(".text", {y:"0%",duration: 1 , stagger:0.25 ,delay:0.5});
    tl.to('.slider',{y:"-100%",duration:1 ,delay:0.2})
    tl.to('.intro',{y:"-100%", duration:1},'-=1')
     tl.to('.greeting',{x:'50%',duration:1,delay:0.5})
    tl.to('.watchnow',{x:'0%',duration:1.5});
    // tl.to('.section1',{y:'0%',duration:2,delay:1.5})
    // document.getElementById('admin-url').addEventListener('click',function(){
    //    tl.to('.admin',{x:'%0',duration:1})
    // });
    gsap.registerPlugin(ScrollTrigger);
    // tl.to('.section1',{y:'-100%',duration:1,
    //     scrollTrigger:{
    //     trigger:'.landing',
    //         start:'bottom center',
    //         markers:true,
    //     }})
   // let t2=gsap.timeline({
   //      scrollTrigger:{
   //          trigger:'.section1',
   //          start:'top bottom',
   //          end:'bottom top',
   //          scrub:true,
   //          markers:true,
   //      }
   //  })
   //  t2.to('.block1',{x:"100",duration:1})
</script>
</body>
</html>

