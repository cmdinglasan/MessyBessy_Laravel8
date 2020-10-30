<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;

class SearchPage extends Component
{
	use WithPagination;
    public $query, $results, $products;

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
        return view('livewire.transactions.searchPage');
    }
}
