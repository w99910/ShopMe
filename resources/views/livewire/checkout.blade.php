<div class="w-8/12 h-full items-center p-4 ml-4 bg-lightwhite rounded-custom">
    <table class="table-fixed overflow-auto h-full ">
      <thead>  <tr class="border-b">
            <td>&nbsp;</td>
            <td>Item Name</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Actions</td>
        </tr>
      </thead>
     <tbody>   @if (!empty($carts))
            @foreach($carts as $cart)
                <tr class="border-t border-b">
                    <td class="w-2/12 "> <img src="{{url('storage/'.$cart->product->image_path)}}" class="object-center object-cover"/> </td>
                    <td>{{$cart->product->name}}</td>
                    <td>
                        <button class="p-2  mx-2 bg-gray-300 focus:outline-none" wire:click="increment({{$cart}})">+</button>{{$cart->quantity}}
                        <button class="p-2 mx-2 bg-gray-300 focus:outline-none" wire:click="decrement({{$cart}})">-</button>
                    </td>
                    <td>{{$cart->price * $cart->quantity}} $</td>
                    <td><button class="px-2 py-1 bg-red-600 focus:outline-none"  wire:click="deleteCart({{$cart->id}})"><i class="fas fa-times"></i></button></td> </tr>
                @endforeach
        @endif
        @if (auth()->user()->carts->count()==0)
                <tr><td>There is no product in your cart.</td></tr>
        @endif
     </tbody>
        <tfoot>
        <tr class="border-t"><td>Total</td><td>{{$total_price}}</td></tr>
        </tfoot>
    </table>
</div>


