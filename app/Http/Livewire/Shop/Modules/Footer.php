<?php

namespace App\Http\Livewire\Shop\Modules;

use Livewire\Component;
use App\Facades\Cart;

class Footer extends Component
{
	public $cart;
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
        return view('livewire.shop.modules.footer');
    }

    public function updateCartTotal(): void
    {
    	$this->cartTotal = count(Cart::get()['products']);
    }
}
