<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserPage extends Component
{
    use WithPagination;
    public $confirmid;
            public $search='';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.user-page',[
            'users'=>User::where('name', 'like', '%'.$this->search.'%')->where('id','!=',auth()->id())->paginate(8),
        ]);
    }
    public function unconfirm($id){
        $this->confirmid=null;
    }

    public function confirm($id){
        $this->confirmid=$id;
    }
    public function delete($id){
        $user=User::find($id);
        $user->delete();
        session()->flash('message', 'User '.$user->name.  ' successfully deleted.');
        $this->resetPage();
        return redirect()->back();
    }

    public function paginationView()
    {
        return 'custom-pagination';
    }
}
