<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $text;
    public $messages=[];
    public function getListeners()
    {
        return [
            "echo-private:message,.message-event.".auth()->id() => 'updateMessage',
        ];
    }
    public function render()
    {
        return view('livewire.chat');
    }
    public function updateMessage($message){

        $this->messages=\App\Message::where('from',auth()->id())->orWhere('to',auth()->id())->get();
    }
    public function sendMessage(){
        $id=auth()->id();
        if($this->text==''){
            return null;
        }
        else {
            $send_message = \App\Message::create(['from' => $id, 'to' => 7, 'message' => $this->text]);
            broadcast(new \App\Events\Message($send_message));
            $this->messages = \App\Message::where('from', auth()->id())->orWhere('to', auth()->id())->get();

            $this->text = '';
        }
    }
    public function mount(){
        $this->messages=\App\Message::where('from',auth()->id())->orWhere('to',auth()->id())->get();
    }
}
