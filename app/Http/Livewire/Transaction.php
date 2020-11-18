<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as Users;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use App\Facades\Cart;

class Transaction extends Component
{
    public $user, $name, $products, $productCount, $time;
    use WithPagination;
    public $searchText, $categories;

    /* Cart Total */
    public $cartTotal = 0;

	protected $rules = [
        'searchText' => 'required|min:1',
        'categories'=> 'nullable',
    ];

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
    	$this->products = Product::all();
    	$this->productCount = count($this->products);

        $searchText = $this->searchText;
        $categories = $this->categories;
        $this->categories= ProductCategory::all();
        
        $this->time = date('H');
        return view('livewire.transaction',[
            'products' => Product::where('name','like', '%'.$searchText.'%')->paginate(10),
            'products' => Product::where('product_category_id', 'like', '%'.$categories.'%')->paginate(10)

        ]);
    }

    public function updateCartTotal(): void
    {
        $this->cartTotal = count(Cart::get()['products']);
    }
}
