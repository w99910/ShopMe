<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPage extends Component
{
    use WithPagination;
    public $search='';
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.product-page',[
            'products' => Product::where('name', 'like', '%'.$this->search.'%')->paginate(8),
        ]);
    }
    public function mount(){

}
    public function paginationView()
    {
        return 'custom-pagination';
    }
}
