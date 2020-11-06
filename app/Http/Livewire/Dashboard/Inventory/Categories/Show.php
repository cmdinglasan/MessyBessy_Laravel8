<?php

namespace App\Http\Livewire\Dashboard\Inventory\Categories;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class Show extends Component
{
    public $catId, $products, $alertLevel, $ind, $categories;
	public $modalFormVisible = false;
	public $modalDelete = false;
	public $name;

	protected $queryString = ['catId'];

	public function updateShowModal()
	{
		$this->modalFormVisible = true;
	}

	public function updateHideModal()
	{
		$this->modalFormVisible = false;
	}

	public function deleteShowModal()
	{
		$this->modalDelete = true;
	}

	public function deleteHideModal()
	{
		$this->modalDelete = false;
	}

	public function update()
	{


		$this->validate([
			'name'	=> 'required',
		]);

		if($this->catId) {

            $categories = ProductCategory::find($this->catId);
            
            if($categories) {
                $categories->update([
                    'name'    => $this->name
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        $this->modalFormVisible = false;

		return redirect()->route('dashboard-categories-show', 'catId='.$this->catId);
	}

	public function delete()
	{
		if($this->catId) {

            $categories = ProductCategory::find($this->catId);
            
            if($categories) {
                $categories->destroy($this->catId);
            }
        }

        session()->flash('message', 'Product '.$this->catId.' is successfully deleted');

        return redirect()->route('dashboard-categories-index');
	}

	public function mount() 
	{
		$this->categories = ProductCategory::where('id',$this->catId)->get()->toArray();
		$categories = ProductCategory::find($this->catId);

		if($categories) {
			$this->catId = $categories->id;
		}
	}
    public function render()
    {
        return view('livewire.dashboard.inventory.categories.show');
    }
}
