<?php

namespace App\Http\Livewire\Dashboard\Inventory\Categories;

use Livewire\Component;
use App\Models\ProductCategory;

class Index extends Component
{
	public $categories, $query, $name;
    public $updateMode = false;
    public $addForm = false;

	protected $rules = [
        'searchText' => 'required|min:1',
        'categories'=> 'nullable',
    ];

    public function resetInputFields()
    {
        $this->name = '';
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

    public function store()
    {

        $categories = new ProductCategory;
        $categories->name = $this->name;

        $categories->save();

        //flash message
        session()->flash('message', 'Category Added');

        $this->addForm = false;

        return redirect()->route('dashboard-categories-index');
    }

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
    	$this->categories = ProductCategory::orderBy('name','asc')
    		->get()
    		->toArray();
    }


    public function render()
    {
    	$query = $this->query;            
        return view('livewire.dashboard.inventory.categories.index');
    }
}
