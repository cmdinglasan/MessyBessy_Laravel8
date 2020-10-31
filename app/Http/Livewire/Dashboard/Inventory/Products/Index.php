<?php

namespace App\Http\Livewire\Dashboard\Inventory\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;

class Index extends Component
{
    use WithPagination;
	public $products, $categories, $query, $results;

    protected $rules = [
        'searchText' => 'required|min:1',
        'categories'=> 'nullable',
    ];

    public function updatedQuery()
    {
        $this->results = Product::where('name','like', '%'.$this->query.'%')
            ->orderBy('name','asc')
            ->get()
            ->toArray();
    }

    public function mount()
    {
        $this->query = '';
        $this->products = Product::orderBy('name','asc')
            ->get()
            ->toArray();
    }

    public function render()
    {
        $query = $this->query;
        $this->categories = ProductCategory::all();
        return view('livewire.dashboard.inventory.products.index');
    }
}
