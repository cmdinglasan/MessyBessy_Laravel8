<?php

namespace App\Http\Livewire\Dashboard\Inventory\Products\Module;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;

class SearchProducts extends Component
{
	use WithPagination;
    public $query, $results, $products, $categories;
    public $selectedItem, $action;
    public $updateMode = false;

    protected $rules = [
        'searchText' => 'required|min:1',
        'categories'=> 'nullable',
    ];

    protected $listeners = [
    	'refreshParent' => '$refresh'
    ];

    public function updatedQuery()
    {
    	$this->results = Product::where('name','like', '%'.$this->query.'%')
    		->orderBy('name','asc')
    		->get()
    		->toArray();
    }

    public function selectItem($itemId, $action)
    {
        $this->selectedItem = $itemId;
        $this->action = $action;

        if($action == 'delete') {
        	$this->dispatchBrowserEvent('openDeleteModal');
        }

    }

    public function delete()
    {
    	Product::destroy($this->selectedItem);
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
        return view('livewire.dashboard.inventory.products.module.search-products');
    }
}
