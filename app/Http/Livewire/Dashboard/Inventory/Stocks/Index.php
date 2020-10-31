<?php

namespace App\Http\Livewire\Dashboard\Inventory\Stocks;
use Livewire\WithPagination;
use App\Models\Branch;

use Livewire\Component;

class Index extends Component
{
    use WithPagination;
	public $branches, $stocks, $query, $results;

    protected $rules = [
        'searchText' => 'required|min:1',
        'branches'=> 'nullable',
    ];

    public function updatedQuery()
    {
        $this->results = Branch::where('branch_name','like', '%'.$this->query.'%')
            ->orderBy('branch_name','asc')
            ->get()
            ->toArray();
    }

    public function mount()
    {
        $this->query = '';
        $this->branches = Branch::orderBy('branch_name','asc')
            ->get()
            ->toArray();
    }

    public function render()
    {
        $query = $this->query;
        $this->branches = Branch::all();
        return view('livewire.dashboard.inventory.stocks.index');
    }
}
