@extends('layouts.home')

@section('content')
       <div class="h-full w-full flex flex-col">
            <div class="flex px-5 py-5 justify-between items-center ">
                <div class="flex">
                    <button class="border border-4 border-gray-400 px-3 py-2 mx-2 rounded-lg focus:outline-none shadow-md">Man</button>
                    <button class="bg-womanbg border-none px-3 py-2 rounded-lg focus:outline-none shadow-md">Woman</button>
                </div>
                <div class="pr-5 flex" x-data="{show:true}">
                    <div class="mx-6 flex">
                        <i class="far fa-bell text-xl "></i>
                        <i class="fas fa-exclamation-circle text-xs text-orange-600" x-show="show"></i>
                    </div>
                    <i class="fas fa-shopping-cart text-xl"></i>
                </div>

            </div>
           <div class="container flex flex-wrap overflow-auto mx-auto border-t-2 border-gray-400 px-2" id="page">

               @foreach($products as $product)
                  <div class="bg-transparent h-64 w-1/3 sm:w-1/3 md:w-1/4 lg:w-1/5 flex flex-col items-center px-2 mb-5">
                      <img src="{{url('storage/product.Red-Tshirt.png')}}"  alt="{{$product->name}}" class="w-full h-auto inline object-cover object-center rounded-lg shadow-lg"
                          />

                      <div class="w-full justify-start bg-white p-2 rounded-b-lg shadow-md">{{$product->name}}{{$product->price}}</div>
                  </div>
               @endforeach
           </div>
       </div>
@endsection
