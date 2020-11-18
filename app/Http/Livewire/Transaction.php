<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as Users;
use App\Models\Product as Products;
use Illuminate\Support\Facades\Auth;
use App\Facades\Cart;

class Transaction extends Component
{
    public $user, $name, $products, $productCount, $time;
    public $cartTotal = 0;


    protected $listeners = [
        'productAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];

    public function mount(): void
    {
        $this->cartTotal = count(Cart::get()['products']);
    }

    public function render()
    {
    	$this->user = Auth::user();
    	$this->products = Products::all();
    	$this->productCount = count($this->products);
        $this->time = date('H');
        return view('livewire.transaction');
    }

    public function updateCartTotal(): void
    {
        $this->cartTotal = count(Cart::get()['products']);
    }
}
