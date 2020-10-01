<div class="absolute bottom-0 right-0 flex flex-col z-100" :class="{'h-5/7 w-8/12 sm:w-4/12':isMessage}" @click.away="isMessage = false">
    <div class="h-full w-full pr-10 pb-12" x-show="isMessage" :class="{'hidden':!isMessage}" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 origin-bottom-right transform  scale-0" x-transition:enter-end="opacity-100 origin-bottom-right transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 origin-bottom-right transform scale-100" x-transition:leave-end="opacity-0 origin-bottom-right transform scale-0">
        <div class="h-full w-full bg-white relative flex flex-col justify-between rounded-xl px-2 py-2">
            <div class="h-full w-full overflow-hidden overflow-y-auto message_scrollbar">
                <ul class="flex flex-col">
                    @foreach($messages as $message)
                        <li class="{{$message->from==auth()->id()?'text-right inline-block my-2':'text-left inline-block my-2'}}">
                          <span class="{{$message->from==auth()->id()?'px-2 py-1 bg-dribbble rounded-xl':'rounded-xl px-2 py-1 bg-alert'}}"> {{$message->message}}
                       </span></li>
                    @endforeach
                </ul>
            </div>
            <div class="flex items-center justify-start w-full px-1 sm:px-2">
                <input wire:model="text" class=" w-full focus:border-blue-500 sm:w-10/12 border border-3 border-transparent focus:outline-none px-1 sm:px-2 sm:py-1 bg-gray-300" type="text"/>
                <button class="px-2 py-1 bg-blue-400 mx-1 sm:mx-2" wire:click="sendMessage">Send</button>
            </div>
        </div>


    </div>
    <button x-on:click="isMessage = !isMessage" class="p-3 rounded-full bg-white focus:outline-none absolute bottom-0 right-0"><i class="origin-center far fa-comment-alt fa-2x text-blue-600" x-show="!isMessage" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-100 origin-center transform rotate-0" x-transition:enter-end="opacity-0 origin-center transform rotate-90" ></i><i class="far fa-times-circle fa-2x text-red-500" x-show="isMessage" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-100 origin-center transform rotate-0" x-transition:enter-end="opacity-0 origin-center transform rotate-90" ></i></button>
</div>
