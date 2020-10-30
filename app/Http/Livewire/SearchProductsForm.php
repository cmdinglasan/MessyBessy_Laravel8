<?php
 
namespace App\Http\Livewire;
 
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
 
class SearchProductsForm extends Component
{
    use WithPagination;
    public $searchText, $categories;

    protected $rules = [
        'searchText' => 'required|min:1',
        'categories'=> 'nullable',
    ];
    public function mount()
    {
        $searchText = $this->searchText;
        $categories = $this->categories;
        $this->categories= ProductCategory::all();
        return view('livewire.SearchProductsForm',[
            'products' => Product::where('name','like', '%'.$searchText.'%')->paginate(10),
            'products' => Product::where('product_category_id', 'like', '%'.$categories.'%')->paginate(10)

        ]);
    }
    public function render()
    {
    	return view('livewire.SearchProductsForm');
    }
}
?>