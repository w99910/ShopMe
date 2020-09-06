<div class="flex flex-col h-full px-5 py-10 min-w-1/2">
    <div class="flex justify-end items-center">  <input type="text" wire:model="search" placeholder="Search" class="border-b-2 border-gray-300 focus:outline-none"> </div>
<table class="table-auto w-full relative h-full">
    <thead>

        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Role</th>

        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{$user->id}}</td>
                <td class="border px-4 py-2">{{$user->name}}</td>
                <td class="border px-4 py-2">{{$user->email}}</td>
                <td class="border px-4 py-2">{{$user->role}}</td>

            </tr>
        @endforeach
    <tr>{{$users->links()}}</tr>

    </tbody>
</table>
</div>
