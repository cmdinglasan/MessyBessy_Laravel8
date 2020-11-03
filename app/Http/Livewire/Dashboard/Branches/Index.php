<?php

namespace App\Http\Livewire\Dashboard\Branches;

use Livewire\Component;
use App\Models\Branch;
use Livewire\WithPagination;

class Index extends Component
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

    public $isOpen = 0;

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function render()

    {

        $this->branches = Branch::all();

        return view('livewire.dashboard.branches.index');
    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function create()

    {

        $this->resetInputFields();

        $this->openModal();

    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function openModal()

    {

        $this->isOpen = true;

    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function closeModal()

    {

        $this->isOpen = false;

    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

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

     

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function store()

    {

        $this->validate([

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

   

        Branch::updateOrCreate(['id' => $this->id], [

            'branch_name' => $this->branch_name,
            'branch_street' => $this->branch_street,
            'branch_city' => $this->branch_city,
            'branch_state' => $this->branch_state,
            'branch_post_code'=> $this->branch_post_code,
            'branch_country' => $this->branch_country,
            'branch_contact_number' => $this->branch_contact_number,
            'branch_operating_hours' => $this->branch_operating_hours,
            'branch_other_info' => $this->branch_other_info

        ]);

  

        session()->flash('message', 

            $this->id ? 'Branch Updated Successfully.' : 'Branch Created Successfully.');

  

        $this->closeModal();

        $this->resetInputFields();

    }

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function edit($id)

    {

        $branch = Branch::findOrFail($id);

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

    

        $this->openModal();

    }

     

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function delete($id)

    {

        Branch::find($id)->delete();

        session()->flash('message', 'Branch Deleted Successfully.');

    }

}
