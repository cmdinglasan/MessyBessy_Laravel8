<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as Users;
use App\Models\Product as Products;
use Illuminate\Support\Facades\Auth;

class Transaction extends Component
{
	public $user, $name, $products, $productCount, $time;
    public function render()
    {
    	$this->user = Auth::user();
    	$this->products = Products::all();
    	$this->productCount = count($this->products);
        $this->time = date('H');
        return view('livewire.transaction');
    }
}