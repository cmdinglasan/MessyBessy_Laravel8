<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as Users;
use App\Models\Product as Products;
use Illuminate\Support\Facades\Auth;

class Transaction extends Component
{
	public $user;
	public $name;
	public $products;
	public $productCount;
    public function render()
    {
    	$this->user = Auth::user();
    	$this->products = Products::all();
    	$this->productCount = count($this->products);
        return view('livewire.transaction');
    }
}
