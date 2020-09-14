<div class="flex flex-col h-full px-5 py-10 min-w-8/12">
    @if (session()->has('message'))

        <div class="bg-red-400 px-2 py-1 z-2 fixed w-1/4 right-0 top-0 flex justify-between items-center rounded-lg mx-2 my-2 shadow-xl"
             id="model-toast">
            <p class="text-xs"> {{ session('message') }}</p>
            <button onclick="document.getElementById('model-toast').style.display='none'"  class="px-3 py-2 focus:outline-none " id="button_click"><i class="fas fa-times"></i></button>

        </div>
        {{session()->forget('message')}}
    @endif
    <div class="flex justify-end items-center">  <input type="text" wire:model="search" placeholder="Search" class="border-b-2 border-gray-300 focus:outline-none"> </div>
<table class="table-fixed w-full relative mb-10">
    <thead>

        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Role</th>
              <th class="px-4 py-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{$user->id}}</td>
                <td class="border px-4 py-2 ">{{$user->name}}</td>
                <td class="border px-4 py-2 truncate">{{$user->email}}</td>
                <td class="border px-4 py-2">{{$user->role}}</td>
                <td class="border px-4 py-2 flex items-center flex-col ">
                    @if($user->id==$confirmid)
                        <p>Are You Sure?</p>
                        <div class="flex justify-center items-center">
                            <button wire:click="delete({{$user->id}})" class="border bg-orange-400 px-3 py-1 rounded-lg">Yes</button>
                            <button wire:click="unconfirm({{$user->id}})" class="border bg-orange-400 px-3 py-1 rounded-lg">No</button>
                        </div>
                    @else
                        <button wire:click="confirm({{$user->id}})" class="border bg-red-400 px-2 py-2 rounded-lg">Delete</button>
                    @endif
                </td>
            </tr>
        @endforeach
    <tr>{{$users->links()}}</tr>

    </tbody>
</table>
</div>
