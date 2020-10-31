<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Branches;
class Branches extends Component
{
	public $products, 
		   $branch_name, 
		   $branch_street,
		   $branch_city,
		   $branch_state,
		   $branch_post_code,
		   $branch_country,
		   $branch_contact_number,
		   $branch_operating_hours,
		   $branch_other_info;

    public function render()
    {
    	$this->branches = Branch::all();
        return view('livewire.branches');
    }
}
