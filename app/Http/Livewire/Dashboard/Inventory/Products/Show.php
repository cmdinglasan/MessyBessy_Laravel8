<?php

namespace App\Http\Livewire\Dashboard\Inventory\Products;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class Show extends Component
{
	public $productId, $products, $alertLevel, $ind;
	public $modalFormVisible = false;
	public $modalDelete = false;
	public $name, $price;

	protected $queryString = ['productId', 'ind'];

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
			'price' => 'required',
		]);

		if($this->productId) {

            $product = Product::find($this->productId);
            
            if($product) {
                $product->update([
                    'name'     => $this->name,
                    'price'   => $this->price
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        $this->modalFormVisible = false;

		return redirect()->route('dashboard-product-show', 'productId='.$this->productId);
	}

	public function delete()
	{
		if($this->productId) {

            $product = Product::find($this->productId);
            
            if($product) {
                $product->destroy($this->productId);
            }
        }

        session()->flash('message', 'Product '.$this->productId.' is successfully deleted');

        return redirect()->route('dashboard-product-index');
	}

	public function mount() 
	{
		$this->products = Product::where('id',$this->productId)->get()->toArray();
		$product = Product::find($this->productId);

		if($product) {
			$this->productId = $product->id;
			$this->name = $product->name;
			$this->price = $product->price;
		}
	}
    public function render()
    {
        return view('livewire.dashboard.inventory.products.show');
    }
}
