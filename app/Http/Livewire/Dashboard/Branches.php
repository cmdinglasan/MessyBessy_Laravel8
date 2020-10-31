<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Branch;
class Branches extends Component
{
	public $branches, 
		   $branch_name, 
		   $branch_street,
		   $branch_city,
		   $branch_state,
		   $branch_post_code,
		   $branch_country,
		   $branch_contact_number,
		   $branch_operating_hours,
		   $branch_other_info;

	public $updateMode = false;

    public function render()
    {
    	$this->branches = Branch::all();
        return view('livewire.dashboard.branches.branches');
    }

    private function resetInputFields(){
    	$this->branch_name = '';
    	$this->branch_street = '';
    	$this->branch_city = '';
    	$this->branch_state = '';
    	$this->branch_post_code = '';
    	$this->branch_country = '';
    	$this->branch_contact_number = '';
    	$this->branch_operating_hours = '';
    	$this->branch_other_info = '';
    }

    public function store()
    {
    	$validateDate = $this->validate([
    		'branch_name' => 'required',
    		'branch_street' => 'required',
    		'branch_city' => 'required',
    		'branch_state' => 'required',
    		'branch_post_code'=> 'required',
    		'branch_country' => 'required',
    		'branch_contact_number' => 'required',
    		'branch_operating_hours' => 'required',
    		'branch_other_info' => 'nullable',
    	]);

    	Branch::create($validateDate);

    	session()->flash('message', 'Branch Successfully Added!');

    	$this->resetInputFields();

    }

    public function edit($id)
    {
    	$this->updateMode = true;
    	$branch = Branch::where('id',$id)->first();
    	$this->branch_id = $id;
    	$this->branch_name = $branch->branch_name;
    	$this->branch_street = $branch->branch_street;
    	$this->branch_city = $branch->branch_city;
    	$this->branch_state = $branch->branch_state;
    	$this->branch_post_code = $branch->branch_post_code;
    	$this->branch_country = $branch->branch_country;
    	$this->branch_contact_number = $branch->branch_contact_number;
    	$this->branch_operating_hours = $branch->branch_operating_hours;
    	$this->branch_other_info = $branch->branch_other_info;

    }

    public function cancel()
    {
    	$this->updateMode = false;
    	$this->resetInputFields;

    }

    public function update()
    {
    	$validateDate = $this->validate([
    		'branch_name' => 'required',
    		'branch_street' => 'required',
    		'branch_city' => 'required',
    		'branch_state' => 'required',
    		'branch_post_code'=> 'required',
    		'branch_country' => 'required',
    		'branch_contact_number' => 'required',
    		'branch_operating_hours' => 'required',
    		'branch_other_info' => 'nullable',
    	]);

    	if ($this->branch_id){
    		$product = Branch::find($this->branch_id);
    		$product->update([
    			'branch_name'=> $this->branch_name,
    			'branch_street'=> $this->branch_street,
    			'branch_city'=>$this->branch_city,
    			'branch_state'=>$this->branch_state,
    			'branch_post_code'=>$this->branch_post_code,
    			'branch_country'=>$this->branch_country,
    			'branch_contact_number'=>$this->branch_contact_number,
    			'branch_operating_hours'=>$this->branch_operating_hours,
    			'branch_other_info'=>$this->branch_other_info,
    		]);
    	}
    }

    public function delete()
    {
    	if($id){
    		Branch::where('id', $id)->delete();
    		session()->flash('message', 'Branch Successfully Deleted');
    	}
    }


}
