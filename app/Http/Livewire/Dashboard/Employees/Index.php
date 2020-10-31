<?php

namespace App\Http\Livewire\Dashboard\Employees;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Index extends Component
{
    use WithPagination;
	public $user,  $query, $results;

    public function render()
    {
        $users = User::paginate(25);

        return view('livewire.dashboard.employees.index', compact('users'));
    }

    protected $rules = [
        'searchText' => 'required|min:1',
        'users='=> 'nullable',
    ];

    public function updatedQuery()
    {
        $this->results = User::where('name','like', '%'.$this->query.'%')
            ->orderBy('name','asc')
            ->get()
            ->toArray();
    }

    public function mount()
    {
        $this->query = '';
        $this->users = User::orderBy('name','asc')
            ->get()
            ->toArray();
    }
}
