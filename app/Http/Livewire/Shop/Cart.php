<?php

namespace App\Http\Livewire\Shop;
use App\Facades\Cart as CartFacade;
use Livewire\Component;

class Cart extends Component
{
    public $cart;

    public function mount()
    {
        $this->cart = CartFacade::get();
    }

    public function render()
    {
        return view('livewire.shop.cart');
    }

    public function removeFromCart($productId)
    {
        CartFacade::remove($productId);
        $this->cart = CartFacade::get();
        $this->emit('productRemoved');
    }

    public function checkout(): void
    {
        CartFacade::clear();
        $this->emit('clearCart');
        $this->cart = CartFacade::get();
    }
}
