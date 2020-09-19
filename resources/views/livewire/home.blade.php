<div class="h-full w-full flex flex-col" x-data="{isDrop:false}">
    <div class="flex px-5 py-5 justify-between items-center ">
        <div class="flex">
            <button class="border border-4 border-gray-400 px-3 py-2 mx-2 rounded-lg focus:outline-none shadow-md">Man</button>
            <button class="bg-womanbg border-none px-3 py-2 rounded-lg focus:outline-none shadow-md">Woman</button>
            <div class="flex mx-10">
                <select wire:model="select" class="focus:outline-none px-2">
                    <option value="">All</option>
                    @foreach($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="pr-5 flex">
            <div class="mx-6 flex">
                <i class="far fa-bell text-xl "></i>
                <i class="fas fa-exclamation-circle text-xs text-orange-600" ></i>
            </div>
            <div class="flex flex-col" x-on:click="isDrop = !isDrop" x-on:click.away="isDrop = false" >
                <div class="flex"> <i class="fas fa-shopping-cart text-xl"></i>
                    <span class="px-1  bg-orange-400 rounded-lg self-end text-xs">{{auth()->user()->carts->count()}}</span>
                </div>
                <div class="absolute w-56 bg-gray-600 right-0 mt-6 rounded-lg mr-4 px-2 py-1 text-white z-40 shadow-lg" x-show="isDrop">
                    @if (!empty($carts))
                        @foreach($carts as $cart)
                            <div class="block">
                                <div class="flex items-center justify-between">  <img src="{{url('storage/'.$cart->product->image_path)}}" class="object-center object-cover w-12 h-12" alt="{{$cart->product->name}}"/>
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
    <div class="container flex flex-wrap overflow-auto mx-auto border-t-2 border-gray-100 px-2 custom_scrollbar">
        @foreach($products as $product)
            <div class="bg-transparent h-64 w-1/3 sm:w-1/3 md:w-1/4 lg:w-1/5 flex flex-col items-center mx-auto px-2  mt-4 mb-8 rounded-t-lg shadow-lg" >
                <div class="w-full rounded-t-lg flex flex-col items-end">
                    <img src="{{url('storage/'.$product->image_path)}}"  alt="{{$product->name}}" class="inline object-cover object-center"/>
                </div>
                <div class="bg-dribbble w-full justify-start bg-white p-2 rounded-lg text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <p>{{$product->name}}</p>
                            <p>{{$product->price}}$</p>
                        </div>
                        @if(empty($product->discounts)!==null)
                           @foreach($product->discounts as $discount)
                            <div class="font-bold p-1 bg-alert mx-1 rounded-lg">-{{$discount->name}}</div>
                            @endforeach
                        @endif
                        <button class="h-full rounded-lg p-3 focus:outline-none focus:border-blue-300 border shadow-inner z-40 bg-white"                         wire:click="purchase_page({{$product}})">
                            <i class="fas fa-shopping-cart text-xl text-orange-500"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($products as $product)
                <div class="bg-transparent h-64 w-1/3 sm:w-1/3 md:w-1/4 lg:w-1/5 flex flex-col items-center mx-auto px-2  mt-4 mb-8 rounded-t-lg shadow-lg" >
                    <div class="w-full rounded-t-lg flex flex-col items-end">
                        <img src="{{url('storage/'.$product->image_path)}}"  alt="{{$product->name}}" class="inline object-cover object-center"/>
                    </div>
                    <div class="bg-dribbble w-full justify-start bg-white p-2 rounded-lg text-white">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <p>{{$product->name}}</p>
                                <p>{{$product->price}}$</p>
                            </div>
                            @if(empty($product->discounts)!==null)
                                @foreach($product->discounts as $discount)
                                    <div class="font-bold p-1 bg-alert mx-1 rounded-lg">-{{$discount->name}}</div>
                                @endforeach
                            @endif
                            <button class="h-full rounded-lg p-3 focus:outline-none focus:border-blue-300 border shadow-inner z-40 bg-white"                         wire:click="purchase_page({{$product}})">
                                <i class="fas fa-shopping-cart text-xl text-orange-500"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>

