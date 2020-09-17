<div class="h-full w-full flex flex-col">
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

        <div class="pr-5 flex" x-data="{show:true}">
            <div class="mx-6 flex">
                <i class="far fa-bell text-xl "></i>
                <i class="fas fa-exclamation-circle text-xs text-orange-600" x-show="show"></i>
            </div>
            <i class="fas fa-shopping-cart text-xl"></i>
        </div>

    </div>
    <div class="container flex flex-wrap overflow-auto mx-auto border-t-2 border-gray-400 px-2" id="page" x-data>

        @foreach($products as $product)
            <div class="bg-transparent h-64 w-1/3 sm:w-1/3 md:w-1/4 lg:w-1/5 flex flex-col items-center mx-auto px-2  mt-4 mb-8 hover:bg-background rounded-t-lg" wire:click="purchase_page({{$product}})">
                <img src="{{url('storage/'.$product->image_path)}}"  alt="{{$product->name}}" class="w-full h-auto inline object-cover object-center rounded-t-lg shadow-lg"
                />

                <div class="w-full justify-start bg-white p-2 rounded-b-lg shadow-md px-5">
                    <div class="flex">
                        <table class="table-auto">
                            <tr><td>Name</td><td>: &nbsp; {{$product->name}}</td></tr>
                            <tr><td>Price</td><td>: &nbsp;{{$product->price}} $ </td></tr>
                        </table>
                    </div>
            </div>
            </div>
        @endforeach
            @foreach($products as $product)
                <div class="bg-transparent h-64 w-1/3 sm:w-1/3 md:w-1/4 lg:w-1/5 flex flex-col items-center mt-4 mb-8 px-2 hover:bg-background rounded-t-lg">
                    <img src="{{url('storage/'.$product->image_path)}}"  alt="{{$product->name}}" class="w-full h-auto inline object-cover object-center shadow-lg"
                    />

                    <div class="w-full justify-start bg-white p-2 rounded-b-lg shadow-md px-5">
                        <div class="flex">
                            <table class="table-auto">
                                <tr><td>Name</td><td>: &nbsp;{{$product->name}}</td></tr>
                                <tr><td>Price</td><td>: &nbsp;{{$product->price}} $ </td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>
