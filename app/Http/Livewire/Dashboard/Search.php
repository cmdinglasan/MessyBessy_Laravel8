<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;

class Search extends Component
{
    use WithPagination;
    public $query, $results, $products, $users, $currentURL;

    protected $rules = [
        'searchText' => 'required|min:1',
    ];

    public function updatedQuery()
    {
    	$this->products = Product::where('name','like', '%'.$this->query.'%')
    		->orderBy('name','asc')
    		->get()
    		->toArray();
        $this->users = User::where('name','like', '%'.$this->query.'%')
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
        $this->users = User::orderBy('name','asc')
            ->get()
            ->toArray();
    }

    public function render()
    {
        $currentURL = \URL::current();

    	$query = $this->query;
        return view('livewire.dashboard.search');
    }
}
