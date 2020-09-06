<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserPage extends Component
{
    use WithPagination;
            public $search='';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.user-page',[
            'users'=>User::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function mount(){

    }
}
