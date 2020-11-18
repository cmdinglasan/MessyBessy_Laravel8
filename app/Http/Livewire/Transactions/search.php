<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Facades\Cart;

class Search extends Component
{
    use WithPagination;
    public $query;
    public $categories;
    protected $rules = [
        'query' => 'required|min:1',
        'categories'=> 'nullable',
    ];
    public function render()
    {
        $query = $this->query;
        $this->categories= ProductCategory::all();
        return view('livewire.transactions.search',[
            'products' => Product::where('name','like', '%'.$query.'%')->paginate(10)
            //'products' => Product::where('product_category_id', 'like', '%'.$categories.'%')->paginate(10)

        ]);
    }

    public function addToCart(int $productId)
    {
        Cart::add(Product::where('id', $productId)->first());
    }
}
?>
