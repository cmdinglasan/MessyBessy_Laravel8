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
    public $user, $query, $results, $roles, $userID, $userInfo, $name, $email, $email_verified_at, $password, $prevName, $prevEmail;

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

    public function update()
    {
        $data = [];

        if ($this->name !== $this->prevName)
        {
            $data = array_merge($data, ['name' => $this->name]);
        }
        if ($this->email !== $this->prevEmail)
        {
            $data = array_merge($data, ['email' => $this->name]);
        }

<<<<<<< HEAD
        if (count($data)) {
=======
        if(count($data)) {
>>>>>>> 31f1aac9679245995a09ffc60848e445c2c35641
            User::find($this->userID)->update($data);
        }
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
