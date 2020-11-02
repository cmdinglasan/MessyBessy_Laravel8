<?php

namespace App\Http\Livewire\Dashboard\Inventory\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;

class Index extends Component
{
    use WithPagination;
	public $products, $categories, $results, $query;
    public $name, $description, $product_category_id, $price, $stock_qty, $stock_defective, $data;
    public $updateMode = false;
    public $addForm = false;

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
        $this->stock_defective = '';
    }

    public function showAddForm()
    {
        $this->addForm = true;
    }

    public function hideAddForm()
    {
        $this->addForm = false;
    }

    public function store()
    {
        $validation = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'product_category_id' => 'required',
            'price' => 'required',
            'stock_qty' => 'required',
            'stock_defective' => 'required'
        ]);

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'product_category_id' => $this->product_category_id,
            'price' => $this->price,
            'stock_qty' => $this->stock_qty,
            'min_stock' => $this->min_stock,
        ]);

        $this->resetInputFields();

        //flash message
        session()->flash('message', 'Product Added');

        $this->addForm = false;

        return redirect()->route('dashboard-product-index');
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
