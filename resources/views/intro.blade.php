<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ShopMe</title>
    <!-- Scripts -->
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
        body::-webkit-scrollbar{
            width:0;
            background: transparent;
        }
        @media only screen and (max-width: 640px) {
            div#menu{
                display: none;
            }

        }
        .nav:hover{
            @apply bg-redme;
            @apply px-3;
        }
    </style>
</head>
<body class="font-poppins antialiased" style="scroll-behavior: smooth;">
<main class="customer overflow-y-scroll absolute min-h-screen min-w-full top-0 left-0 flex flex-col" id="body_scroll">
    <div class="landing bg-soft_pink min-h-screen items-center justify-between flex flex-col relative  text-redme" id="page1">
        <div class="relative w-full flex justify-between items-center pt-2 sm:pt-6 overflow-hidden px-4 sm:px-24">
            <span class="shopme font-dancing fluid_text_xl inline-block">ShopMe</span>
            <div class="nav-wrapper inline-block" >
                <nav>
                    <ul class="flex" >
                        @guest
                            <li><a href="{{route('login')}}" class=" fluid_text_md px-1 sm:px-2 mx-1 border-b-4 border-transparent hover:border-redme">Login</a></li>
                            <li><a href="{{route('signup')}}" class=" fluid_text_md px-1 sm:px-2 mx-1 border-b-4 border-transparent hover:border-redme">Sign Up</a> </li>
                        @endguest
                        @auth
                            <li><a href="{{route('home')}}" class=" fluid_text_md px-1 sm:px-2 mx-1 border-b-4 border-transparent hover:border-redme">Home</a></li>

                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
        <div class="img-wrapper w-full sm:w-6/12 h-auto inline-block self-center">
            <img src="{{url('images/shopme_24thSep_with Transparent.png')}}" class="bg-cover object-center" alt="shopme">
        </div>
        <span class="w-full h-12"></span>
    </div>
    <div class="h-screen w-full flex flex-col sm:flex-row bg-redme transform -translate-y-24" id="page2">
        <div class=" w-full sm:w-1/2 h-full flex items-center overflow-hidden justify-center">
            <img src="{{asset('images/search_engine.png')}}" alt="search_" class="w-10/12"  id="Layer_1">
        </div>
        <div class="w-full sm:w-1/2 h-full relative overflow-hidden flex justify-center items-center">
            <div class="toTopBox1 bg-soft_pink w-full h-full absolute bottom-0 left-0 transform translate-y-full"></div>
            <div class="relative box1 flex fluid_text_md items-center justify-center w-2/3 bg-redme shadow-lg h-5/7 font-bold">
                <div class="box1 absolute flex border border-redme items-center justify-center bg-soft_pink w-4/5 top-0 left-0 -mt-5 -ml-5 shadow-xl h-1/2 sm:h-5/7 px-2 text-redme">
                    <p class="relative">
                        <span>Search and Explore the items</span>
                    </p>
                </div>
                <div class="box1 absolute border border-redme flex items-center justify-center bg-soft_pink w-4/5 bottom-0 right-0 -mb-10 -mr-10 shadow-xl h-1/2 px-2 text-redme">
                    <p class="relative">
                        <span>Add to your Cart</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="h-screen w-full flex flex-col sm:flex-row bg-soft_pink" id="page3">

        <div class="w-full sm:w-1/2 h-full flex justify-center fluid_text_md relative items-center overflow-hidden bg-soft_pink text-bold">
            <div class="w-3/5 h-auto sm:h-1/2 flex flex-col justify-between text-white">
                <div class="page3_text bg-redme px-6 mb-2 sm:my-0 py-2 sm:px-12 sm:py-6 md:py-12 flex text-center rounded-xl justify-center items-center">
                    <span >Buy more items and get more discounts  </span>
                </div>
                <div class="page3_text bg-redme px-6 py-2 mb-2 sm:my-0 sm:px-12 sm:py-4 md:py-10 flex  text-center rounded-xl justify-center items-center">
                    <span> Save your favourite items in your cart for later. </span>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-1/2 h-full relative flex justify-center items-center bg-redme">
            <img src="{{asset('images/Online_shopping_PNG.png')}}" class="page3_image w-7/12" alt="discount"/>
        </div>

    </div>
    <div class="h-screen w-full flex flex-col sm:flex-row bg-soft_pink" id="page4">
        <div class="w-full sm:w-1/2 h-full relative flex flex-col-reverse sm:flex-col  bg-redme">
            <div class="w-full h-1/2 bg-redme flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="svg_card w-6/12" viewBox="0 0 457.018 350.812"><defs><style>.a,.b{fill:#fff;}.b{stroke:#707070;}.c{fill:#c8ccd5;}.d{fill:#ffae33;}.e{stroke:none;}.f{fill:none;}</style></defs><g transform="translate(-1306.491 -113.094)"><rect class="a" width="339" height="229" transform="translate(1456.271 113.094) rotate(25)"/><g class="b" transform="translate(1403.271 113.094) rotate(25)"><rect class="e" width="339" height="229"/><rect class="f" x="0.5" y="0.5" width="338" height="228"/></g><rect class="c" width="139" height="29" rx="14.5" transform="translate(1410.627 144.96) rotate(25)"/><rect class="c" width="139" height="166" rx="23" transform="translate(1549.627 207.96) rotate(25)"/><rect class="c" width="139" height="29" rx="14.5" transform="translate(1387.627 184.96) rotate(25)"/><rect class="c" width="139" height="29" rx="14.5" transform="translate(1365.627 227.96) rotate(25)"/><rect class="d" width="139" height="29" rx="14.5" transform="translate(1341.627 269.96) rotate(25)"/></g></svg>
            </div>
            <div class="w-full h-1/2 bg-soft_pink p-4">
                <div class="page4_text w-full bg-redme text-center h-full flex justify-center items-center text-soft_pink fluid_text_md uppercase">
                    <span>Online Payments</span>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-1/2 h-full flex flex-col  fluid_text_md relative  overflow-hidden bg-soft_pink text-bold">
            <div class="w-full h-1/2 bg-soft_pink p-4">
                <div class="page4_text w-full h-full bg-redme flex text-center justify-center items-center text-soft_pink fluid_text_md uppercase">
                    <span>Customer Support with Real-time Chat</span>
                </div>
            </div>
            <div class="w-full h-1/2 bg-redme flex items-center justify-center">
                <img src="{{asset('images/undraw_begin_chat_c6pj.svg')}}" class="svg_card w-7/12 sm:w-7/12" alt="delivery"/>
            </div>
        </div>
    </div>
    <div class="w-full h-32 bg-soft_pink py-3 px-3">
        <div class="w-full h-full bg-redme flex justify-center items-center text-white text-center">
            {{--             <div class="flex">--}}
            <span>Contact me:   <i class="fas fa-envelope ml-2 text-xl"></i> zawlintun@utycc.edu.mm</span>
            {{--             </div>--}}
        </div>
    </div>
</main>
<div class="intro fixed bg-soft_pink top-0 left-0 w-full h-full flex justify-center items-center z-20">
    {{--           <div class="w-1/2 h-1/2 absolute top-0 left-0 transform translate-x-1/2 translate-y-1/2">--}}
    {{--               <img src="{{asset('images/welcome_without_text.png')}}" class="bg-cover object-center" alt="welcome_image">--}}
    {{--           </div>--}}
    <div class="intro-text text-2xl  flex flex-col text-center justify-center items-center text-redme">
        <h1 class="hide">
            <span class="my_text">Hello from ShopMe</span>
        </h1>
        <h1 class="hide">
            <span class="my_text">Ease your shopping online with Ours</span>
        </h1>


    </div>
</div>
<div class="slider h-full w-full bg-redme fixed top-0 left-0 transform translate-y-full z-30"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.5.3/smooth-scrollbar.js"></script>
<script>

    gsap.registerPlugin(ScrollTrigger);
    const tl = gsap.timeline({ defaults:{ ease:"power1.out" } });
    tl.to(".my_text", {y:"0%",duration: 1,stagger:0.25 ,delay:0.5});
    tl.to('.slider',{y:"-100%",duration:1 ,delay:0.2})
    tl.to('.intro',{y:"-100%", duration:1},'-=1')
    tl.from('.img-wrapper',{scale:0.5,autoAlpha:0,duration:1.2,transformOrigin:'center',ease:'back.out(2)'})
    tl.from('.shopme',{x:"-100%", opacity:0,duration:1},'-=0.3');
    tl.from('.nav-wrapper',{x:"100%",autoAlpha:0, duration:0.5},'-=0.3');
    tl.to('#page2',{y:"0%",duration:1,scrollTrigger:{
            trigger:"#page1",
            start:'bottom center',
            scrub:true,
        }})
    let body_scroll=Scrollbar.init(document.querySelector('#body_scroll'));
    ScrollTrigger.scrollerProxy("main", {
        scrollTop(value) {
            if (arguments.length) {
                body_scroll.scrollTop = value;
            }
            return body_scroll.scrollTop;
        }
    });
    body_scroll.addListener(ScrollTrigger.update);

    let trigger1=gsap.timeline({
        scrollTrigger:{
            trigger:'#page2',
            start:'top center',
            end:'10% center',
            toggleActions:'restart play reverse none'
        }
    })
    let trigger2=gsap.timeline({
        scrollTrigger:{
            trigger:'#page2',
            start:'-20% center',
            end:'top bottom',
            toggleActions:'restart play reverse none'
        }
    })
    let trigger_page3=gsap.timeline({
        scrollTrigger:{
            trigger:'#page3',
            start:'-10% center',
            end:'top 80%',
            toggleActions:'restart play reverse none'
        }
    })
    let trigger_page4=gsap.timeline({
        scrollTrigger:{
            trigger:'#page4',
            start:'-20% center',
            end:'20% bottom',
            toggleActions:'restart play reverse none',
        }
    })
    trigger1.from('#Layer_1',{x:'-100%',autoAlpha:0,ease:'power2.out'})
    trigger1.from('.box1',{x:'100%',autoAlpha:0,stagger:0.3,duration:0.3,ease:'back.out(2)'});
    trigger2.to('.toTopBox1',{y:'0%',ease:'power1.out'})
    trigger_page3.from('.page3_text',{y:'100%',autoAlpha:0,stagger:0.25,ease:'back.out(2)',delay:0.4})
    trigger_page3.from('.page3_image',{scale:0.2,autoAlpha:0,ease:'expo.out'},'-=0.5')
    trigger_page4.from('.svg_card',{scale:0.2,autoAlpha:0,stagger:0.5,transformOrigin:'center',ease:'back.out(3)'},'-=0.5');
    trigger_page4.from('.page4_text',{x:'-100%',autoAlpha:0,stagger:0.5,ease:'back.out(2)'});


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

