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
    public $name, $description, $product_category_id, $price, $stock_qty, $min_stock;

    protected $rules = [
        'searchText' => 'required|min:1',
        'categories'=> 'nullable',
    ];

    public function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->product_category_id = '';
        $this->price = '';
        $this->stock_qty = '';
        $this->min_stock = '';
    }

    public function store()
    {
        $validation = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'product_category_id' => 'required',
            'price' => 'required',
            'stock_qty' => 'required',
            'min_stock' => 'required'
        ]);

        Product::create($validation);

        $this->resetInputFields();

        $this->emit('userStore');
    }

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
