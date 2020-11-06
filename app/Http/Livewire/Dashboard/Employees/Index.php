<?php

namespace App\Http\Livewire\Dashboard\Employees;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Team;

class Index extends Component
{
    use WithPagination;
	public $user, $query, $results, $roles, $userID, $userInfo;

    protected $queryString = ['userID'];

    public function render()
    {
        $users = User::paginate(25);
        $teams = Team::all();
        $this->roles = DB::table('team_user')
            ->get()
            ->toArray();

        return view('livewire.dashboard.employees.index', compact('users', 'teams'));
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

        $this->userInfo = User::where('id',$this->userID)->get()->toArray();
    }
}
