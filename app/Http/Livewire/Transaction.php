<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as Users;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class Transaction extends Component
{
	public $user, $name, $products, $productCount, $time;
    use WithPagination;
    public $searchText, $categories;

	protected $rules = [
        'searchText' => 'required|min:1',
        'categories'=> 'nullable',
    ];

    public function mount()
    {
        $searchText = $this->searchText;
        $categories = $this->categories;
        $this->categories= ProductCategory::all();
        return view('livewire.transaction',[
            'products' => Product::where('name','like', '%'.$searchText.'%')->paginate(10),
            'products' => Product::where('product_category_id', 'like', '%'.$categories.'%')->paginate(10)

        ]);
    }

    public function render()
    {
    	$this->user = Auth::user();
    	$this->products = Product::all();
    	$this->productCount = count($this->products);
        $this->time = date('H');
        return view('livewire.transaction');
    }
}
