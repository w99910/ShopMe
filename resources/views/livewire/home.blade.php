<div class="h-full w-full flex flex-col" x-data="{isDrop:false}">
    <div class="flex flex-col px-5 py-5 justify-between items-center sm:flex-row ">
      <div class="flex">
          <div class="flex relative justify-center items-center">
        <input class="focus:outline-none border border-transparent focus:border-blue-300 px-4 py-1 rounded-custom w-full" wire:model="search" placeholder="Search by name">
           <i class="fas fa-search absolute right-0 mr-2 opacity-0 sm:opacity-50 " ></i>
       </div>

            <div class="flex mx-4 px-0 sm:px-2">
                <select wire:model="select" class="focus:outline-none px-0 sm:px-2 py-1 rounded-xl shadow-md">
                    <option value="">All</option>
                    @foreach($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

      </div>

        <div class="mt-3 sm:pr-5 flex sm:mt-0  ">

            <div class="mr-3 p-2 rounded-xl bg-white">
              <a href="{{route('checkout')}}" class="focus:outline-none hover:cursor-pointer"> <i class="fas fa-cash-register"></i>
              </a>
            </div>
            <div class="flex flex-col p-2 rounded-xl bg-white mr-3 pt-3" x-on:click="isDrop = !isDrop" x-on:click.away="isDrop = false" >
                <div class="flex cursor-pointer"> <i class="fas fa-shopping-cart"></i>
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
            <div class="mr-3 flex rounded">
                <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="{{auth()->user()->name}}" class="w-10 h-10" />
            </div>
        </div>
    </div>
    <div class="container flex flex-wrap overflow-auto mx-auto border-t-2 border-gray-100 px-2 custom_scrollbar rounded-custom">
        @foreach($products as $product)
            <div class="bg-transparent h-64 w-1/3 sm:w-1/3 md:w-1/4 lg:w-1/5 flex flex-col items-center mx-auto px-2  mt-4 mb-8 rounded-t-xl relative" >
                <div class="w-full rounded-t-lg flex flex-col items-end bg-white">
                    <img src="{{url('storage/'.$product->image_path)}}"  alt="{{$product->name}}" class="inline object-cover object-center"/>
                </div>
                <div class="bg-semi w-full justify-start bg-white p-0 sm:p-2 rounded-lg text-white">
                    <div class="flex flex-col items-start sm:items-center justify-between sm:flex-row pl-2 sm:pl-0">
                        <div class="flex flex-col">
                            <p>{{$product->name}}</p>
                            <p>{{$product->price}}$</p>
                        </div>
                        @if(empty($product->discounts)!==null)
                            @foreach($product->discounts as $discount)
                                <div class="font-bold p-1 bg-alert mx-1 rounded-lg text-xs sm:text-md">-{{$discount->name}}</div>
                            @endforeach
                        @endif
                        <button class="h-full rounded-lg p-1 sm:p-3 focus:outline-none focus:border-blue-300 border shadow-inner z-40 bg-white" wire:click="purchase_page({{$product}})">
                            <i class="fas fa-shopping-cart text-md sm:text-xl text-orange-500"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
            @foreach($products as $product)
                <div class="bg-transparent h-64 w-1/3 sm:w-1/3 md:w-1/4 lg:w-1/5 flex flex-col items-center mx-auto px-2  mt-4 mb-8 rounded-t-xl relative" >
                    <div class="w-full rounded-t-lg flex flex-col items-end bg-white">
                        <img src="{{url('storage/'.$product->image_path)}}"  alt="{{$product->name}}" class="inline object-cover object-center"/>
                    </div>
                    <div class="bg-semi w-full justify-start bg-white p-0 sm:p-2 rounded-lg text-white">
                        <div class="flex flex-col items-start sm:items-center justify-between sm:flex-row pl-2 sm:pl-0">
                            <div class="flex flex-col">
                                <p>{{$product->name}}</p>
                                <p>{{$product->price}}$</p>
                            </div>
                            @if(empty($product->discounts)!==null)
                                @foreach($product->discounts as $discount)
                                    <div class="font-bold p-1 bg-alert mx-1 rounded-lg text-xs sm:text-md">-{{$discount->name}}</div>
                                @endforeach
                            @endif
                            <button class="h-full rounded-lg p-1 sm:p-3 focus:outline-none focus:border-blue-300 border shadow-inner z-40 bg-white" wire:click="purchase_page({{$product}})">
                                <i class="fas fa-shopping-cart text-md sm:text-xl text-orange-500"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>

