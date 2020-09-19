<div class="flex w-full">

  <div class="w-2/4">
      @foreach($carts as $cart)
      <ul>
        <li>
            <div class="bg-gray-600 p-4">{{$cart->product->name}}
                <button class="px-2 py-1 bg-red-300" wire:click="delete({{$cart->id}})">Delete</button>
            </div>
        </li>
    </ul>
      @endforeach

  </div>
    <div class="w-2/4"> <button class="px-2 py-1 bg-orange-300" wire:click="add_cart({{1}})">Add</button></div>
</div>
