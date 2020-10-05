{{--<div class="w-full flex flex-col m-0 bg-soft_pink" x-data="{isDrop:false,isMessage:false,isUser:false}">--}}
{{--    <div class="flex px-5 py-5 justify-between items-center ">--}}
{{--        <div class="flex">--}}
{{--            <a href="{{route('home')}}">--}}
{{--                <svg id="color" enable-background="new 0 0 24 24" height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m12 0c-6.617 0-12 5.383-12 12s5.383 12 12 12 12-5.383 12-12-5.383-12-12-12z" fill="#2196f3"/><path d="m12 0c-6.617 0-12 5.383-12 12s5.383 12 12 12z" fill="#1d83d4"/><path d="m10.73 18.791-6.5-6.25c-.147-.142-.23-.337-.23-.541s.083-.399.23-.541l6.5-6.25c.475-.458 1.27-.119 1.27.541v3.25h5.75c.689 0 1.25.561 1.25 1.25v3.5c0 .689-.561 1.25-1.25 1.25h-5.75v3.25c0 .664-.798.995-1.27.541z" fill="#fff"/><path d="m19 12h-15c0 .204.083.399.23.541l6.5 6.25c.15.145.334.21.514.21.385-.001.756-.299.756-.751v-3.25h5.75c.689 0 1.25-.561 1.25-1.25z" fill="#dedede"/></svg>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <div class="pr-5 flex">--}}
{{--            <div class="mr-3 p-2 rounded-xl bg-white">--}}
{{--                <a href="{{route('checkout')}}" class="focus:outline-none hover:cursor-pointer"> <i class="fas fa-cash-register"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="flex flex-col p-2 rounded-xl bg-white mr-3 pt-3" x-on:click="isDrop = !isDrop" x-on:click.away="isDrop = false" >--}}
{{--                <div class="flex cursor-pointer"> <i class="fas fa-shopping-cart"></i>--}}
{{--                    <span class="px-1  bg-orange-400 rounded-lg self-end text-xs">{{auth()->user()->carts->count()}}</span>--}}
{{--                </div>--}}
{{--                <div class="absolute w-56 bg-gray-600 right-0 mt-6 rounded-lg mr-4 px-2 py-1 text-white z-40 shadow-lg" x-show="isDrop">--}}
{{--                    @if (!empty($carts))--}}
{{--                        @foreach($carts as $cart)--}}
{{--                            <div class="block">--}}
{{--                                <div class="flex items-center justify-between">  <img src="{{url($cart->product->image_path)}}" class="object-center object-cover w-12 h-12" alt="{{$cart->product->name}}"/>--}}
{{--                                    {{$cart->product->name}}--}}
{{--                                    <button class="px-2 py-1 bg-red-500 rounded-lg" wire:click="deleteCart({{$cart->id}})"><i class="fas fa-times"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                    @if (auth()->user()->carts->count()==0)--}}
{{--                        <div class="block"><p class="px-2 py-1">There is no product in your Cart</p></div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="relative h-full mr-3 flex rounded" x-on:click="isUser = !isUser" @click.away="isUser=false">--}}
{{--                <img src="{{ auth()->user()->profile_url === null ? Avatar::create(auth()->user()->name)->toBase64() : auth()->user()->profile_url  }}" alt="{{auth()->user()->name}}" class=" rounded-full w-10 h-10" />--}}
{{--                <div class="absolute px-3 rounded-lg bottom-0 right-0 bg-white z-50 -mb-16" x-show="isUser">--}}
{{--                    <ul>--}}
{{--                        <li class="py-2 px-4"><a href="{{route('user_profile')}}">Profile</a></li>--}}
{{--                        <li class="py-2 px-4"><form method="POST" action="{{route('custom_logout')}}" >--}}
{{--                                @csrf--}}
{{--                                <button type="submit" class="focus:outline-none">Logout</button></form></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}
{{--    <div class="w-full h-full flex flex-col sm:flex-row mx-auto border-t-2 border-gray-400 px-5 py-3">--}}
{{--        <div class="w-full sm:w-8/12 flex mr-5">--}}
{{--            <div class="w-full border-none rounded-lg shadow-lg flex flex-col sm:flex-row rounded-lg bg-white">--}}
{{--                <div class="w-full justify-center items-center flex bg-semi">--}}
{{--                    <img src="{{url($product->image_path)}}" class="inline-flex object-cover object-center "/>--}}
{{--                </div>--}}
{{--                <div class="w-full sm:w-3/6 py-2 px-3 flex flex-col justify-between">--}}
{{--                    <table class="table-auto">--}}
{{--                        <tr><td class="border hover:border-blue-200 px-2 py-2">Name</td><td class="border hover:border-blue-200 px-2 py-2">{{$product->name}}</td></tr>--}}
{{--                        <tr><td class="border hover:border-blue-200 px-2 py-2">Price</td><td class="border hover:border-blue-200 px-2 py-2">${{$product->price}}</td></tr>--}}
{{--                        <tr><td class="border hover:border-blue-200 px-2 py-2">Available Quantity</td><td class="border hover:border-blue-200 px-2 py-2">{{$product->quantity}}</td></tr>--}}
{{--                        <tr><td class="border hover:border-blue-200 px-2 py-2">Size</td><td class="border hover:border-blue-200 px-2 py-2">{{$product->size}}</td></tr>--}}

{{--                    </table>--}}
{{--                    <div class="flex px-3">--}}
{{--                                                    <button class="px-3 py-1 rounded-lg bg-gray-600 mr-4 hover:bg-gray-500 " wire:click="addCart({{$product->id}},{{$product->price}})">--}}
{{--                        <button class="w-4/12 mt-2 sm:mt-0 py-1 sm:text-md rounded-lg bg-gray-600 mr-4 hover:bg-gray-500 focus:outline-none text-white " wire:click="add({{$product->id}},{{$product->price}})">Add to Cart</button>--}}
{{--                        <a class="w-8/12 py-1 mt-2 sm:mt-0 rounded-lg bg-green-500 hover:bg-green-400 text-center focus:outline-none text-white"  href="{{route('checkout')}}">Proceed to Checkout</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="w-full my-5 sm:m-0 sm:w-4/12 flex flex-col justify-between">--}}
{{--            <div class="w-full py-2 rounded-lg shadow-xl px-3 h-64 custom_scrollbar bg-white overflow-auto">--}}
{{--                <table class="table-auto overflow-auto">--}}
{{--                    <tr>Your Cart</tr>--}}

{{--                    @if (!empty($carts))--}}

{{--                        @foreach($carts as $cart)--}}
{{--                            <tr class="flex flex-wrap items-center justify-between">--}}
{{--                                <td class="w-2/12"> <img src="{{url($cart->product->image_path)}}" class="object-center object-cover"/> </td>--}}
{{--                                <td class="truncate">{{$cart->product->name}}</td>--}}

{{--                                <td><button class="p-2 bg-gray-300 focus:outline-none" wire:click="increment({{$cart->id}})">+</button></td>--}}
{{--                                <td>{{$cart->quantity}}</td>--}}

{{--                                <td><button class="p-2 bg-gray-300 focus:outline-none" wire:click="decrement({{$cart->id}})">-</button></td>--}}

{{--                                <td><button class="px-2 py-1 bg-red-600 focus:outline-none"  wire:click="deleteCart({{$cart->id}})"><i class="fas fa-times"></i></button></td> </tr>--}}
{{--                        @endforeach--}}

{{--                    @endif--}}
{{--                    @if (auth()->user()->carts->count()==0)--}}
{{--                        <tr><td>There is no product in your cart.</td></tr>--}}
{{--                    @endif--}}
{{--                </table>--}}

{{--            </div>--}}
{{--            <div class="w-full flex overflow-x-scroll px-3 py-2 custom_scrollbar relative h-full sm:h-auto">--}}
{{--                <span class="bg-lightwhite px-2 rounded-lg text-gray-600">You may also like this</span>--}}
{{--                @foreach($suggestions as $suggestion)--}}
{{--                    <div class="flex flex-col w-full bg-semi mx-2 rounded-lg border-none" style="min-width: fit-content;">--}}
{{--                        <img src="{{url($suggestion->image_path)}}" class="object-center object-cover w-56 cursor-pointer" wire:click="purchase_page({{$suggestion->id}})"/>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--</div>--}}

<div class="w-full relative flex flex-col justify-center overflow-hidden items-center rounded-custom h-full bg-cello-200 px-2 sm:px-5 sm:py-2" x-data="dropdown()">
    <div class="fixed bottom-0 right-0 flex flex-col z-100" :class="{'h-5/7 w-11/12 sm:w-4/12':isMessage}" @click.away="isMessage = false">
        <div class="h-full w-full pr-10 pb-12" x-show="isMessage" :class="{'hidden':!isMessage}" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 origin-bottom-right transform  scale-0" x-transition:enter-end="opacity-100 origin-bottom-right transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 origin-bottom-right transform scale-100" x-transition:leave-end="opacity-0 origin-bottom-right transform scale-0">
            <div class="h-full w-full bg-soft_pink border border-4 border-blue-500 relative flex flex-col justify-between rounded-xl px-2 py-2">
                <div class="h-full w-full overflow-hidden overflow-y-auto message_scrollbar">
                    <ul class="flex flex-col">
                        @foreach($messages as $message)
                            <li class="inline-block relative my-3 {{$message->from==auth()->id()?'text-right ':'text-left'}}">
                                <span class="{{$message->from==auth()->id()?'px-2 py-1 bg-dribbble rounded-xl':'rounded-xl px-2 py-1 bg-alert'}}"> {{$message->message}}
                                </span>
                                <span class="text-xs text-gray-600 -mb-5 bottom-0 {{$message->from==auth()->id()?'right-0':'left-0'}}">{{$message->time}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex items-center justify-start w-full px-1 py-1 sm:px-2 py-2">
                    <input wire:model="text" class=" w-full focus:border-blue-500 sm:w-10/12 border rounded-bl-xl border-3 border-transparent focus:outline-none px-1 sm:px-2 sm:py-1 bg-gray-500" type="text"/>
                    <button class="px-2 py-1 bg-blue-400 mx-1 sm:mx-2" wire:click="sendMessage">Send</button>
                </div>
            </div>


        </div>
        <button x-on:click="isMessage = !isMessage" class="p-3 rounded-full bg-white focus:outline-none absolute bottom-0 right-0"><i class="origin-center far fa-comment-alt fa-2x text-blue-600" x-show="!isMessage" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-100 origin-center transform rotate-0" x-transition:enter-end="opacity-0 origin-center transform rotate-90" ></i><i class="far fa-times-circle fa-2x text-red-500" x-show="isMessage" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-100 origin-center transform rotate-0" x-transition:enter-end="opacity-0 origin-center transform rotate-90" ></i></button>
    </div>
    <div class="w-10/12 py-3 sm:h-1/2 h-1/3 bg-cello-500 absolute top-0 mt-5 -z-10 rounded-custom" >

        <div class="flex  justify-between w-full px-3 relative">
         <span></span>
         <h1 class="text-white font-bold w-full text-2xl text-center">Product Details</h1>
        <div class="absolute top-0 right-0 mr-3 flex flex-col p-2 z-40  rounded-xl bg-white pt-3" x-on:click="isDrop = !isDrop" x-on:click.away="isDrop = false" >
            <div class="flex cursor-pointer"> <i class="fas fa-shopping-cart"></i>
                <span class="px-1  bg-orange-400 rounded-lg self-end text-xs">{{auth()->user()->carts->count()}}</span>
            </div>
            <div class="absolute top-0 right-0 mt-10 flex flex-col w-56 bg-gray-600 rounded-lg px-2 py-1 text-white shadow-lg" x-show="isDrop">
                @if (!empty($carts))
                    @foreach($carts as $cart)
                        <div class="block w-full">
                            <div class="flex items-center justify-between">  <img src="{{url($cart->product->image_path)}}" class="object-center object-cover w-12 h-12" alt="{{$cart->product->name}}"/>
                                {{$cart->product->name}}
                                <button class="px-2 py-1 bg-red-500 rounded-lg" wire:click="deleteCart({{$cart->id}})"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if (auth()->user()->carts->count()==0)
                    <div class="block"><p class="px-2 py-1">There is no product in your Cart</p></div>
                @endif
            </div>
        </div>
    </div>
    </div>
    <div class="w-full sm:w-9/12 bg-cello-100 h-5/7 rounded-custom p-1 relative">
          <div class="bg-cello-500 w-full h-full rounded-custom flex flex-col justify-between justify-items-stretch items-center sm:flex-row relative overflow-hidden py-3 sm:py-0">

                     <div class="flex sm:w-3/12 flex-col justify-between items-center h-full p-5">

                          <h1 class="font-bold text-2xl text-white">{{$product->name}}</h1>
                          <h1 class="font-bold text-2xl text-white text-alert">{{$product->price}}$</h1>
                         <p class="break-words text-white fluid_text_sm">Nobody wants to see an engagement photo with you in your ratty jeans and t-shirt. Go for layers, and you're always going to look like you made more of an effort.
                            </p>
                         <div class="flex items-center justify-self-start text-alert mt-2">
                         <span class="font-bold text-white">Review:</span>
                             <div>
                                 <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                             </div>
                             </div>
                     </div>
                  <div class="sm:h-full sm:w-6/12 w-11/12 items-center flex justify-center sm:p-0 p-4 ">
                   <div class="rounded-full bg-cello-200 items-center flex sm:py-0">
                       <img src="{{url($product->image_path)}}" alt="{{$product->name}}" class="z-10 bg-cover object-center">
                   </div>
                  </div>
              <div class="flex flex-col sm:w-3/12 items-center justify-center px-2">
                  <div class="flex sm:flex-col flex-row items-center justify-center">
                          <button class="w-full text-center py-4 sm:text-md h-full mx-1 rounded-lg bg-indigo-800 hover:bg-indigo-700 focus:outline-none text-white " wire:click="add({{$product->id}},{{$product->price}})">Add to Cart</button>
                          <a class="w-full text-center sm:py-4 sm:mt-3 text-redme h-full mx-1 rounded-lg bg-alert hover:bg-orange-500 text-center focus:outline-none"  href="{{route('checkout')}}">Proceed to Checkout</a>
                  </div>

          </div>
      </div>
</div>
    <div class="w-full p-2 rounded-xl absolute bottom-0 bg-redme transform h-1/2 z-80 suggestions translate-y-full">
             <div class="absolute top-0 w-full left-0 -mt-10 text-center"><i class="svg-indicator fas fa-chevron-circle-up text-redme text-4xl bg-white rounded-full cursor-pointer" x-on:click="toggleSuggest"></i></div>
          <div class="container w-full p-3 flex bg-soft_pink h-full rounded-xl flex-col flex-wrap overflow-auto overflow-y-hidden custom_scrollbar">
              @foreach($suggestions as $suggestion)
                  <div class="h-full w-10/12 sm:w-3/12 bg-redme rounded-xl mr-3 flex">
                      <img src="{{url($suggestion->image_path)}}" alt="{{$suggestion->name}}" class="w-auto bg-cover object-center cursor-pointer" wire:click="purchase_page({{$suggestion->id}})">
                  </div>
              @endforeach
          </div>
    </div>
</div>
     @push('scripts')
         <script>
             tl1=gsap.timeline({defaults:{ease:'power1.out'}});
         const dropdown = function(){
            return {
                isDrop:false,
                isMessage:false,
            isSuggest:false,
                toggleSuggest(){
                    if(!this.isSuggest){
                         tl1.to('.suggestions',{y:'0%'});
                         tl1.to('.svg-indicator',{transformOrigin:'center',rotateZ:'180',ease:'expo.out'},'-=0.5')
                         this.isSuggest=true;
                    }
                    else {
                        tl1.to('.suggestions',{y:'100%'});
                        tl1.to('.svg-indicator',{transformOrigin:'center',rotateZ:'0',ease:'expo.out'},'-=0.5')

                        this.isSuggest=false;
                    }
                }

            }
         }
         </script>
         @endpush
