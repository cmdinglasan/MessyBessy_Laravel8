<?php

namespace App\Http\Livewire\Shop\Modules;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as Users;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductModal extends Component
{

	public $products, $productsList, $product, $item;

    use WithPagination;

	public function mount()
	{
		$productsList = Product::all();

		$this->products = $productsList->splice(2,1);
			
	}

    public function render()
    {
        return view('livewire.shop.modules.product-modal');
    }
}
