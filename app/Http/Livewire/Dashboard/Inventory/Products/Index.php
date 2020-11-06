<?php

namespace App\Http\Livewire\Dashboard\Inventory\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;
	public $products, $categories, $results, $query;
    public $name, $description, $product_category_id, $price, $stock_qty, $stock_defective, $data, $min_stock, $category, $image;
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
        $this->image = '';
        $this->price = '';
        $this->stock_qty = '';
        $this->minimum_stock = '';
    }

    public function showAddForm()
    {
        $this->addForm = true;

        $this->resetInputFields();
    }

    public function hideAddForm()
    {
        $this->addForm = false;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }

    public function removeTempImage()
    {
        $image = '';
    }

    public function store()
    {

        $imageName = $this->image->store('img/products', 'public');

        $product = new Product;
        $product->name = $this->name;
        $product->description = $this->description;
        $product->image = $imageName;
        $product->product_category_id = $this->category;
        $product->price = $this->price;
        $product->stock_qty = $this->stock_qty;
        $product->minimum_stock = $this->min_stock;


        $product->save();

        //flash message
        session()->flash('message', 'Product Added');

        $this->addForm = false;

        return redirect()->route('dashboard-product-index');

        /*

        Product::save([
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

        return redirect()->route('dashboard-product-index'); */
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
        $this->category = 1;
    }

    public function render()
    {
        $query = $this->query;
        $this->categories = ProductCategory::all();
        return view('livewire.dashboard.inventory.products.index');
    }
}
