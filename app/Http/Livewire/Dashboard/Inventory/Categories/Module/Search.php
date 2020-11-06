<?php

namespace App\Http\Livewire\Dashboard\Inventory\Categories\Module;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;

class Search extends Component
{
    use WithPagination;
    public $query, $results, $categories;
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
    	$this->results = ProductCategory::where('name','like', '%'.$this->query.'%')
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
    	$this->products = ProductCategory::orderBy('name','asc')
    		->get()
    		->toArray();
    }

    public function render()
    {
    	$query = $this->query;
    	$this->categories = ProductCategory::all();
        return view('livewire.dashboard.inventory.categories.module.search');
    }
}
