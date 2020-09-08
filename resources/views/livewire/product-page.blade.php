           <div class="flex flex-col h-full px-5 py-10" x-data="{isOpen:false}" x-data>

               @if (session()->has('message'))

                   <div class="bg-red-400 px-2 py-1 z-2 fixed w-1/4 right-0 top-0 flex justify-between items-center rounded-lg mx-2 my-2 shadow-xl"
                        id="model-toast">
                       <p class="text-xs"> {{ session('message') }}</p>
                          <button onclick="document.getElementById('model-toast').style.display='none'"  class="px-3 py-2 focus:outline-none " id="button_click"><i class="fas fa-times"></i></button>

                   </div>
                   {{session()->forget('message')}}
               @endif
               <div class="flex justify-end items-center">  <input type="text" wire:model="search" placeholder="Search" class="border-b-2 border-gray-300 focus:outline-none">  </div>
<table class="table-fixed w-full relative  h-full">


    <thead>
    <tr>
        <th class="px-1 py-2">ID</th>
        <th class="px-4 py-2">Product_Name</th>
        <th class="px-4 py-2">Price</th>
        <th class="px-4 py-2 ">Available</th>
        <th class="px-4 py-2">Image_Path</th>
        <th class="px-4 py-2">Purchased_by_User</th>
        <th class="px-4 py-2"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td class="border px-4 py-2">{{$product->id}}</td>
            <td class="border px-4 py-2">{{$product->name}}</td>
            <td class="border px-4 py-2">{{$product->price}}</td>
            <td class="border px-4 py-2">{!! $product->available?'<span class="text-green-300">Available</span>':'<span class="text-red-300" >Not Available</span>'!!}</td>
            <td class="border px-4 py-2">{{$product->image_path ?? ''}}</td>
            <td class="border px-4 py-2">{{optional($product)->purchased_by_user}}</td>
            <td class="border px-4 py-2 flex  h-full justify-center">
             <div class="flex items-center flex-col h-full">
                 @if($product->id==$confirmid)
               <p>Are You Sure?</p>
                   <div class="flex justify-center items-center">
                       <button wire:click="delete({{$product->id}})" class="border bg-orange-400 px-3 py-1 rounded-lg">Yes</button>
                       <button wire:click="unconfirm({{$product->id}})" class="border bg-orange-400 px-3 py-1 rounded-lg">No</button>
                   </div>
                       @else
                    <button wire:click="confirm({{$product->id}})" class="border bg-red-400 px-2 py-2 rounded-lg">Delete</button>
                @endif
             </div>
               @if ($product->id !== $confirmid)
                    <button x-on:click="{isOpen = !isOpen}" class="px-4 bg-orange-500 rounded-lg" wire:click="$emit('editform',{{$product->id}})"  >Edit</button>

               @endif
               </td>
        </tr>
    @endforeach
    <tr> <td>{{$products->links()}} </td></tr>
    </tbody>
</table>
          @push('scripts')


              @endpush
           </div>




