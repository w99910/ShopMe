           <div class="flex flex-col h-full px-5 py-10">
               <div class="flex justify-end items-center">  <input type="text" wire:model="search" placeholder="Search" class="border-b-2 border-gray-300 focus:outline-none"> <p>{{$search}}</p> </div>
<table class="table-fixed w-full relative mx-4 h-full">


    <thead>
    <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Product_Name</th>
        <th class="px-4 py-2">Price</th>
        <th class="px-4 py-2">Available</th>
        <th class="px-4 py-2">Image_Path</th>
        <th class="px-4 py-2">Purchased_by_User</th>
{{--            <th><input type="text" wire:model="search" placeholder="Search"> </th>--}}
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
        </tr>
    @endforeach
    <tr> <td>{{$products->links()}} </td></tr>
    </tbody>
</table>
           </div>
