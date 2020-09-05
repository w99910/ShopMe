@extends('layouts.app')

@section('content')
<div class="grid grid-cols-2 w-full">
    <div class="col-span-1 bg-primary flex justify-center items-center rounded-bl-custom rounded-tl-custom">
        <img src="{{asset("images/authentication.png")}}" class="w-10/12 py-20" alt="authentication"/>
        </div>
    <div class="col-span-1 bg-secondary rounded-br-custom rounded-tr-custom flex justify-around items-center px-10 py-10 relative">
        <div class=" py-10 bg-primary rounded-lg relative ">
                     @livewire('login')
            <div class="flex  lg:px-10  md:px-5 justify-start items-center mt-5">or Sign In with <i class="fab fa-google-plus ml-2"></i> <i class="fab fa-facebook-square ml-2"></i><i class="fab fa-github ml-2"></i></div>
        </div>
    </div>
</div>

@endsection
