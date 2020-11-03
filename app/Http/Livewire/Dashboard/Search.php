<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;

class Search extends Component
{
    use WithPagination;
    public $query, $results, $products;

    protected $rules = [
        'searchText' => 'required|min:1',
    ];

    public function updatedQuery()
    {
    	$this->products = Product::where('name','like', '%'.$this->query.'%')
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
        return view('livewire.dashboard.search');
    }
}
