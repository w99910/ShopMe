@extends('layouts.admin_layout')
@section('content')

<div class="w-full bg-white items-center flex justify-center h-full" x-show="open2"> @livewire('user-page')</div>
<div class="w-full bg-white items-center flex justify-center h-full" x-show="open3"> @livewire('product-page')</div>

@endsection
