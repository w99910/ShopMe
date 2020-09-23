@extends('layouts.app')

@section('content')
<div class="grid grid-cols-2 w-full" x-data="{alert:true}">
    @if(session()->has('message'))
    <div class=" bg-orange-400 absolute right-0 top-0 mt-4 mr-2" x-show="alert"><span class="flex justify-between px-3 py-2">{{session()->get('message')}}<button x-on:click="alert = !alert"><i class="far fa-times-circle"></i></button></span> </div>
    @endif
    <div class="col-span-1 bg-primary flex justify-center items-center rounded-bl-custom rounded-tl-custom overflow-hidden" id="png1">
        <img src="{{asset("images/authentication.png")}}" class="image inline-block w-10/12 py-20" alt="authentication"/>
        </div>
    <div class="rounded-custom col-span-2 sm:col-span-1 bg-secondary sm:rounded-br-custom sm:rounded-tr-custom sm:rounded-bl-none sm:rounded-tl-none flex justify-around items-center px-10 py-10 relative">
        <div class="px-5 py-10 bg-primary rounded-lg relative shadow-xl ">
                     @livewire('login')
            <div class="flex  lg:px-10  md:px-5 justify-start items-center mt-5">or Sign In with
               <a href="/login/google">
                   <i class="fab fa-google-plus ml-2 text-red-600 text-xl"></i>
               </a>
               <a href="/login/github">
                   <i class="fab fa-github ml-2 text-xl"></i>
               </a>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script>
        // const tl = gsap.timeline({defaults: {duration: .7, ease: Back.easeOut.config(2), opacity: 0}});
        const tl = gsap.timeline({ defaults:{ duration:2.5,delay:1 , ease:"none" } });

        tl.to('.image',{y:"16",repeat:-1,yoyo:true})

    </script>
@endpush
