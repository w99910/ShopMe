<form action="{{route('signup')}}" method="POST" class="flex flex-col lg:px-8  md:px-5 justify-start">
    @csrf
    <p class="font-bold text-2xl">Sign Up</p>
    <div class="flex flex-col items-start mt-5 mb-6">
           <div class="flex items-center">
               <i class="fas fa-user pr-3"></i>
        <input type="text" id="email" wire:model="name" name="name" placeholder="Name" autocomplete="off" class="bg-transparent outline-none border-b-2">
             </div>
               @error('name')
        <span class="text-xs text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div class="flex flex-col items-start mb-6">
         <div class="flex items-center">
             <i class="fas fa-envelope pr-3"></i>
        <input type="text" id="email" wire:model="email" name="email" placeholder="Email" autocomplete="off" class="bg-transparent outline-none border-b-2">
       </div>
        @error('email')
        <span class="text-xs text-red-400">{{$message}}</span>
        @enderror
    </div>

    <div class="flex flex-col items-start mb-6">
         <div class="flex items-center">
             <i class="fas fa-unlock-alt pr-3"></i>
        <input type="password" name="password" id="password" wire:model="password" placeholder="Password" autocomplete="off" class=" bg-transparent outline-none border-b-2">
       </div>
        @error('password')
        <span class="text-xs text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div class="flex flex-col items-start mb-6">
          <div class="flex items-center">
              <i class="fas fa-unlock pr-3"></i>
        <input type="password" name="password_confirmation" id="password" wire:model="password_confirmation" placeholder="Confirm_Password" autocomplete="off" class="   bg-transparent outline-none border-b-2">
              </div>
              @error('password_confirmation')
        <span class="text-xs text-red-400">{{$message}}</span>
        @enderror
    </div>


    <div class="flex items-center mt-5">
        <button type="submit" class="bg-secondary w-8/12  py-2 rounded-custom tracking-widest text-white focus:outline-none border-none">Register</button>
        <p class="text-xs text-secondary ml-3">Already Have An Account?<a href="{{route('signin')}}" class="underline">Login Here</a> </p></div>
</form>
