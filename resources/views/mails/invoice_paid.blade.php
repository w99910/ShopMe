<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'E-Commerce') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-screen w-full overflow-hidden justify-center items-center flex font-poppins">
    <div class="w-1/3 h-full flex flex-col justify-center bg-white px-16">
   <div class="w-full p-3 bg-green-400">Your Payment has been successfully paid</div>
    <div class="table bg-gray-300">
        <div class="table-row">

            <div class="table-cell px-2 py-1 border border-white border-2">Item Name</div>
            <div class="table-cell px-2 py-1 border border-white border-2">Item Quantity</div>

            <div class="table-cell px-2 py-1 border border-white border-2">Item Price</div>
        </div>
        @foreach($carts as $cart)
        <div class="table-row">
            <div class="table-cell px-2 py-1 border border-white border-2">{{$cart->product->name}}</div>
            <div class="table-cell px-2 py-1 border border-white border-2">{{$cart->quantity}}</div>

            <div class="table-cell px-2 py-1 border border-white border-2">{{$cart->price}}</div>
        </div>
            @endforeach
        <div class="table-row">

            <div class="table-cell px-2 py-1 border border-white border-2"></div>
            <div class="table-cell px-2 py-1 border border-white border-2">Total</div>

            <div class="table-cell px-2 py-1 border border-white border-2">{{$total_price}}</div>
        </div>
    </div>
</div>
</body>
</html>
