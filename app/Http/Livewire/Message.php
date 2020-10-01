<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Message extends Component
{
//    protected $listeners = ['echo:message,.message-event.6' => 'notifyNewOrder'];
    public $selected;
    public $messages=[];
    public $users;
    public $text;
    public function render()
    {
        return view('livewire.message');
    }
    public function getListeners()
    {
        return [
            "echo-private:message,.message-event.7" => 'notifyNewOrder',
        ];
    }
    public function mount(){
        $this->users=User::all();
    }
    public function showMessage($id){
        $this->selected=$id;
        $one=\App\Message::where('from',$this->selected)->where('to',auth()->id())->get();
        $two=\App\Message::where('to',$this->selected)->where('from',auth()->id())->get();
        $this->messages=$one->merge($two)->sortby('created_at');
    }
    public function sendMessage(){
        $id=auth()->id();
       if ($this->text !=''){
           $send_message=\App\Message::create(['from'=>$id,'to'=>$this->selected,'message'=>$this->text]);
           broadcast(new \App\Events\Message($send_message));
           $one=\App\Message::where('from',$this->selected)->where('to',auth()->id())->get();
           $two=\App\Message::where('to',$this->selected)->where('from',auth()->id())->get();
           $this->messages=$one->merge($two)->sortby('created_at');
           $this->text='';
       } else {
           return null;
       }

    }

    public function notifyNewOrder($message)
    {
        $new=array_shift($message);
        $one=\App\Message::where('from',$new['from'])->where('to',auth()->id())->get();
        $two=\App\Message::where('to',$new['from'])->where('from',auth()->id())->get();
        $this->messages=$one->merge($two)->sortby('created_at');

    }
}
