<div class="flex h-full flex bg-soft_pink shadow-lg px-2 py-1">
   <div class="flex flex-col overflow-x-auto overflow-y-hidden">
       @foreach($users as $user)
           <span class="px-2 py-1 mx-2 my-2 bg-blue-400 block cursor-pointer" wire:click="showMessage({{$user->id}})">{{$user->name}}</span>
       @endforeach
   </div>
    <div class="w-full h-full flex flex-col justify-between relative">
            <div class="w-full overflow-y-auto overflow-x-hidden">
                @if($selected = !null)
               <ul class="flex flex-col inline-block">
                @foreach($messages as $message)
                       <li class="{{$message->from==auth()->id()?'text-right inline-block my-2':'text-left inline-block my-2'}}">
                          <span class="{{$message->from==auth()->id()?'px-2 py-1 bg-dribbble':'px-2 py-1 bg-alert'}}"> {{$message->message}}
                       </span></li>
                @endforeach
               </ul>
               @endif
            </div>
                    <div class="flex justify-around items-center">
                        <input wire:model="text" class="focus:border-blue-500 border w-8/12 border-3 border-transparent focus:outline-none px-2 py-1 bg-gray-300" type="text"/>
                        @if($selected = !null)
                            <button class="px-2 py-1 bg-blue-400 mx-1 sm:mx-2" wire:click="sendMessage">Send</button>
                        @else
                            <button class="cursor-not-allowed" disabled>Send</button>
                        @endif
                    </div>
    </div>

</div>

