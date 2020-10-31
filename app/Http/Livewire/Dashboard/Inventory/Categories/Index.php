<?php

namespace App\Http\Livewire\Dashboard\Inventory\Categories;

use Livewire\Component;
use App\Models\ProductCategory;

class Index extends Component
{
	public $categories, $query;

	protected $rules = [
        'searchText' => 'required|min:1',
        'categories'=> 'nullable',
    ];

    public function updatedQuery()
    {
    	$this->categories = ProductCategory::where('name','like', '%'.$this->query.'%')
    		->orderBy('name','asc')
    		->get()
    		->toArray();
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
        return view('livewire.dashboard.inventory.categories.index');
    }
}
