<div class="h-full w-full flex flex-col m-0 bg-soft_pink" x-data="{isDrop:false}">
    <div class="flex px-5 py-5 justify-between items-center ">
        <div class="flex">
            <a href="{{route('home')}}">
                <svg id="color" enable-background="new 0 0 24 24" height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m12 0c-6.617 0-12 5.383-12 12s5.383 12 12 12 12-5.383 12-12-5.383-12-12-12z" fill="#2196f3"/><path d="m12 0c-6.617 0-12 5.383-12 12s5.383 12 12 12z" fill="#1d83d4"/><path d="m10.73 18.791-6.5-6.25c-.147-.142-.23-.337-.23-.541s.083-.399.23-.541l6.5-6.25c.475-.458 1.27-.119 1.27.541v3.25h5.75c.689 0 1.25.561 1.25 1.25v3.5c0 .689-.561 1.25-1.25 1.25h-5.75v3.25c0 .664-.798.995-1.27.541z" fill="#fff"/><path d="m19 12h-15c0 .204.083.399.23.541l6.5 6.25c.15.145.334.21.514.21.385-.001.756-.299.756-.751v-3.25h5.75c.689 0 1.25-.561 1.25-1.25z" fill="#dedede"/></svg>
            </a>
        </div>

        <div class="pr-5 flex">
            <div class="mx-6 flex p-2 rounded-xl bg-white">
                <i class="far fa-bell text-xl "></i>
                <i class="fas fa-exclamation-circle text-xs text-orange-600"></i>
            </div>
            <div class="flex flex-col p-2 rounded-xl bg-white" x-on:click="isDrop = !isDrop" >
               <div class="flex"> <i class="fas fa-shopping-cart text-xl"></i>
                <span class="px-1  bg-orange-400 rounded-lg self-end text-xs">{{auth()->user()->carts->count()}}</span>
               </div>
                 <div class="absolute w-56 bg-gray-600 right-0 mt-6 rounded-lg mr-4 px-3 py-2 text-white" x-show="isDrop">

                         @if (!empty($carts))
                             @foreach($carts as $cart)
                             <div class="block ">
                            <div class="flex items-center justify-between">  <img src="{{url('storage/'.$cart->product->image_path)}}" class="object-center object-cover w-12 h-12" alt="{{$cart->product->name}}"/>
                                     {{$cart->product->name}}
                                   <button class="px-2 py-1 bg-red-600 rounded-lg" wire:click="deleteCart({{$cart->id}})"><i class="fas fa-times"></i></button>
                             </div>
                             </div>
                                 @endforeach

                         @endif
                         @if (auth()->user()->carts->count()==0)
                           <div class="block">There is no product in your Cart</div>
                         @endif

                 </div>
            </div>

        </div>

    </div>
    <div class="w-full h-full flex mx-auto border-t-2 border-gray-400 px-5 py-3">
        <div class="w-8/12 flex mr-5">
            <div class="w-full border-none rounded-lg shadow-lg flex flex-col sm:flex-row rounded-lg bg-white">
                 <div class="w-full justify-center items-center flex bg-semi">
                     <img src="{{url('storage/'.$product->image_path)}}" class="inline-flex object-cover object-center "/>
                 </div>
                    <div class="w-3/6 py-2 px-3 flex flex-col justify-between">
                        <table class="table-auto">
                         <tr><td class="border hover:border-blue-200 px-2 py-2">Name</td><td class="border hover:border-blue-200 px-2 py-2">{{$product->name}}</td></tr>
                            <tr><td class="border hover:border-blue-200 px-2 py-2">Price</td><td class="border hover:border-blue-200 px-2 py-2">${{$product->price}}</td></tr>
                            <tr><td class="border hover:border-blue-200 px-2 py-2">Available Quantity</td><td class="border hover:border-blue-200 px-2 py-2">{{$product->quantity}}</td></tr>

                        </table>
                        <div class="flex px-3">
{{--                            <button class="px-3 py-1 rounded-lg bg-gray-600 mr-4 hover:bg-gray-500 " wire:click="addCart({{$product->id}},{{$product->price}})">--}}
                            <button class="px-3 py-1 rounded-lg bg-gray-600 mr-4 hover:bg-gray-500 focus:outline-none " wire:click="$emit('addCart',{{$product}})">Add to Cart</button>
                            <a class="px-3 py-1 rounded-lg bg-green-500 hover:bg-green-400 text-center focus:outline-none" href="{{route('checkout')}}">Proceed to Checkout</a>
                        </div>
                    </div>
            </div>

        </div>
        <div class="w-4/12 flex flex-col justify-between">
            <div class="w-full py-2 rounded-lg shadow-xl px-3 h-64 custom_scrollbar bg-white overflow-auto">
                <table class="table-auto overflow-auto">
                    <tr>Your Cart</tr>

                    @if (!empty($carts))

                        @foreach($carts as $cart)
                            <tr class="flex flex-wrap items-center justify-between">
                                <td class="w-2/12"> <img src="{{url('storage/'.$cart->product->image_path)}}" class="object-center object-cover"/> </td>
                                <td class="truncate">{{$cart->product->name}}</td>

                                <td><button class="p-2 bg-gray-300 focus:outline-none" wire:click="increment({{$cart}})">+</button></td>
                                <td>{{$cart->quantity}}</td>

                                    <td><button class="p-2 bg-gray-300 focus:outline-none" wire:click="decrement({{$cart}})">-</button></td>

                                <td><button class="px-2 py-1 bg-red-600 focus:outline-none"  wire:click="deleteCart({{$cart->id}})"><i class="fas fa-times"></i></button></td> </tr>
                        @endforeach

                    @endif
                    @if (auth()->user()->carts->count()==0)
                       <tr><td>There is no product in your cart.</td></tr>
                    @endif
                </table>

            </div>
            <div class="w-full flex overflow-x-scroll px-3 py-2 custom_scrollbar">
                @foreach($suggestions as $suggestion)
                    <div class="flex flex-col w-full bg-semi mx-2 rounded-lg border-none" style="min-width: fit-content;">
                        <img src="{{url('storage/'.$suggestion->image_path)}}" class="object-center object-cover w-56 cursor-pointer" wire:click="purchase_page({{$suggestion}})"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
