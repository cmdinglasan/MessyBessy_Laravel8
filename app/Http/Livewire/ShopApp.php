<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;

class ShopApp extends Component
{
	public $products;
    public function render()
    {
    	$this->products = Products::all();
        return view('livewire.shopApp');
    }
}
