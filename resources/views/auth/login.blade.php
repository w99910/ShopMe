@extends('layouts.app')

@section('content')
<div class="grid grid-cols-2 w-full">
    <div class="col-span-1 bg-primary flex justify-center items-center rounded-bl-custom rounded-tl-custom" id="png1">
        <img src="{{asset("images/authentication.png")}}" class="w-10/12 py-20" alt="authentication" id="image"/>
        </div>
    <div class="rounded-custom col-span-2 sm:col-span-1 bg-secondary sm:rounded-br-custom sm:rounded-tr-custom sm:rounded-bl-none sm:rounded-tl-none flex justify-around items-center px-10 py-10 relative">
        <div class="px-5 py-10 bg-primary rounded-lg relative shadow-xl ">
                     @livewire('login')
            <div class="flex  lg:px-10  md:px-5 justify-start items-center mt-5">or Sign In with <i class="fab fa-google-plus ml-2"></i> <i class="fab fa-facebook-square ml-2"></i><i class="fab fa-github ml-2"></i></div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script>
        const tl = gsap.timeline({defaults: {duration: .7, ease: Back.easeOut.config(2), opacity: 0}});
        tl.from('#image',{delay:1,scale:.2,transformOrigin:'center'},"=.2")
    </script>
@endpush
