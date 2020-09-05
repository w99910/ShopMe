<form action="{{route('signin')}}" method="POST" class="flex flex-col lg:px-8  md:px-5 justify-start">
    @csrf
    <p class="font-bold text-2xl">Sign In</p>
    <div class="flex flex-col items-start mt-5 mb-5">   <input type="text" id="email" wire:model="email" name="email" placeholder="Email" autocomplete="off" class="bg-transparent outline-none border-b-2">
        @error('email')
        <span class="text-xs text-red-400">{{$message}}</span>
        @enderror
        @if(Session::has('message'))
            <span class="text-xs text-red-400">{{Session::get('message')}}</span>
            @endif
    </div>

    <div class="flex flex-col items-start mb-5">    <input type="password" name="password" id="password" wire:model="password" placeholder="Password" autocomplete="off" class="   bg-transparent outline-none border-b-2">
        @error('password')
        <span class="text-xs text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div class="flex items-center"><input type="checkbox" id="remember_me" name="remember" ><label for="remember_me" class="ml-5">Remember Me</label></div>

    <div class="flex items-center mt-5">
        <button type="submit" class="bg-secondary w-8/12  py-2 rounded-custom tracking-widest text-white outline-none border-none">Login</button>
        <p class="text-xs text-secondary ml-3">Create New Account <a href="{{route('signup')}}" class="underline">Here</a> </p></div>
</form>
