<div class="w-full h-full" x-data="{password:'',confirm:''}">
    <div class="bg-white w-full rounded-lg h-full flex items-center justify-center">
        <form class="flex flex-col w-full sm:w-1/3">
            <span class="px-2 py-1 bg-yellow-300 flex items-center"><i class="fas fa-exclamation-circle text-xl mx-4"></i>Please set your new Password</span>
            <div class="flex flex-col">
                <input x-model="password" class="focus:outline-none border focus:border-blue-500 my-5 px-3 py-1 rounded-xl" wire:model="password" type="text" placeholder="New Password">
                @error('password')
                <span class="text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <input x-model="confirm" class="focus:outline-none border focus:border-blue-500 mb-5 px-3 py-1 rounded-xl" wire:model="confirm_password" type="text"  placeholder="Confirm Password">
                @error('confirm_password')
                <span class="text-red-600">{{$message}}</span>
                @enderror
            </div>
            <button class="px-2 py-1 bg-green-500 focus:outline-none focus:bg-green-400" wire:click="login" :class="{'cursor-not-allowed ':password.length==0 || confirm.length == 0 || password != confirm}">Login</button>
        </form>
    </div>
</div>
