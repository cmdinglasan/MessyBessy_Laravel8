<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;
use App\Facades\Cart;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;

class Header extends Component
{
	public $cartTotal = 0;
    public $query;
    public $categories;
    protected $rules = [
        'query' => 'required|min:1',
        'categories'=> 'nullable',
    ];
    use WithPagination;

	protected $listeners = [
        'productAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];

    public function mount(): void
    {
        $this->cartTotal = count(Cart::get()['products']);
    }

    public function updateCartTotal(): void
    {
        $this->cartTotal = count(Cart::get()['products']);
    }
    
    public function render()
    {
        $query = $this->query;
        $this->categories= ProductCategory::all();
        return view('livewire.transactions.header',[
            'products' => Product::where('name','like', '%'.$query.'%')->paginate(10)
            //'products' => Product::where('product_category_id', 'like', '%'.$categories.'%')->paginate(10)

        ]);
    }
}
