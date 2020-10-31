<?php

namespace App\Http\Livewire\Dashboard\Inventory\Stocks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Stock;

class Show extends Component
{

    use WithPagination;
	public $products, $categories, $stocks, $query, $results, $branch, $branchId;

    protected $rules = [
        'searchText' => 'required|min:1',
        'branches'=> 'nullable',
    ];

    public function updatedQuery()
    {
        $this->results = Product::where('branch_name','like', '%'.$this->query.'%')
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
        // $this->stocks = Stock::where("branch_id", );
    }

    public function render()
    {
        $query = $this->query;
        $branchId = $_GET['id'];
        $stocks = Stock::where('branch_id',$branchId);
        return view('livewire.dashboard.inventory.stocks.show', [
            'branchId' => $_GET['id'],
        ]);
    }
}
