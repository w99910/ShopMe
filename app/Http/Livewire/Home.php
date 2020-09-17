<?php

namespace App\Http\Livewire;

use App\Category;
use App\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class Home extends Component
{
    public $select;
    public $products;

    protected $listeners=['new'=>'newest','refresh'=>'refresh'];
    public function refresh(){
        return redirect()->route('home');
    }
    public function purchase_page(Product $product){
        return redirect('/purchase/'.$product->id);
    }
    public function newest(){

        $products=Product::whereHas('categories',function(Builder $query){
            $query->where('name','like','%'.$this->select.'%');
        })->get();
        $now=Carbon::today()->subDays(5);

        $this->products=$products->intersect(Product::where('created_at','>=',$now)->get());
        return redirect()->back();
    }

    public function updatedSelect(){
        $this->products=Product::whereHas('categories',function(Builder $query){
           $query->where('name','like','%'.$this->select.'%');
        })->get();

    }
    public function render()
    {

        return view('livewire.home',[

            'categories'=>Category::all(),
        ]);
    }
    public function mount(){
        $this->products=Product::all();
    }

}
