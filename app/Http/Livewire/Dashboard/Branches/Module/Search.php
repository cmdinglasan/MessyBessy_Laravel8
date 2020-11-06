<?php

namespace App\Http\Livewire\Dashboard\Branches\Module;

use Livewire\Component;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    public $query, $results, $branches;

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
    	$this->results = Branch::where('branch_name','like', '%'.$this->query.'%')
    		->orderBy('branch_name','asc')
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
    	Branch::destroy($this->selectedItem);
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
        return view('livewire.dashboard.branches.module.search');
    }
}
