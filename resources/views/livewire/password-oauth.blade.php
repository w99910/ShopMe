<div class="w-full h-full  p-4 sm:p-12">
    <div class="bg-white w-full rounded-lg h-full flex items-center justify-center">
        <form class="flex flex-col w-1/3">
            <span class="px-2 py-1 bg-yellow-300 flex"><i class="fas fa-exclamation-circle text-xl"></i>Please set your new Password</span>
            <div class="flex flex-col">
                <input class="focus:outline-none border focus:border-blue-500 my-5 px-3 py-1 rounded-xl" wire:model="password" type="text" placeholder="New Password">
               @error('password')
                <span class="text-red-300">{{$message}}</span>
                @enderror
            </div>
           <div class="flex flex-col">
               <input class="focus:outline-none border focus:border-blue-500 mb-5 px-3 py-1 rounded-xl" wire:model="confirm_password" type="text"  placeholder="Confirm Password">
               @error('confirm_password')
               <span class="text-red-300">{{$message}}</span>
               @enderror
           </div>
               <button class="px-2 py-1 bg-green-500" wire:click="login">Login</button>
        </form>
    </div>
</div>
