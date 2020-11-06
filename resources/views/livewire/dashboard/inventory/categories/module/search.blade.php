<div>

@if(isset($selectedItem))
<div class="modal fade show id-{{ $selectedItem }}" id="deleteProduct" tabindex="-1" role="dialog" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-red-500 text-white">
        <form>
            <div class="modal-header mb-0 text-center">
                <h5 class="modal-title w-100">
                	<i class="fas fa-exclamation-triangle mr-3 opacity-25"></i>Delete Product
            	</h5>
            </div>
            <div class="modal-body m-0 text-center">
            	<div class="row px-3 pb-3 ">
                    <center>
                    	<span class="d-block" style="text-align: center; width: 100%;">Are you want to {{ $action }} record {{ $selectedItem }}?</span>
                    </center>
                </div>
                <div class="row flex mt-3 mx-1 ">
                	<div class="col">
                    	<button class="p-3 bg-red-700 rounded-md text-white mr-3" data-dismiss="modal">
                    		Cancel
                    	</button>
                    </div>
                    <div class="col text-right">
                    	<button class="p-3 bg-white rounded-md text-red-500" data-dismiss="modal">
                    		Sure, Delete it!
                    	</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
@endif

	<div class="">
		<input type="text" class="form-input w-100" wire:model="query" placeholder="Search"/>

		@if(isset($selectedItem))
			<span class="id-{{ $selectedItem }}">Will {{ $action }} ProductId {{ $selectedItem }}</span>
		@endif
	</div>

	<table class="table-auto sortable w-100">
	  <thead class="sticky top-0">
	    <tr class="border-b border-gray-100">
	      <th class="p-4 text-blue-500 uppercase">Category Name</th>
	      <th class="p-4 text-blue-500 uppercase"></th>
	    </tr>
	  </thead>
	  <tbody>
		@if(!empty($query))
			@if(!empty($results))
				@foreach($results as $result)
				<tr class="result hover:bg-gray-100">
					<td class="p-4">
						<div class="product-info">
							<h4 class="font-bold">
								<a href="{{ route('dashboard-categories-show', 'catId='.$result['id']) }}">
                                    <span>{{ $result['name'] }}</span>
                                </a>
							</h4>
						</div>
					</td>
					<td class="p-4">
						<div class="product-action">
							<button class="btn editProduct bg-blue-400 hover:bg-blue-500 text-center text-white ml-2" role="button" wire:click="selectItem({{ $result['id'] }}, 'edit')">
							<i class="fas fa-plus"></i>
							<span>Edit</span>
							</button>
							<button class="btn deleteProduct bg-red-400 hover:bg-red-500 text-center text-white ml-2" role="button" wire:click="selectItem({{ $result['id'] }}, 'delete')">
							<i class="fas fa-trash"></i>
							<span>Delete</span>
							</button>
						</div>
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="5">
						<div class="result error text-center">
							<span class="error-text">No results found. Try searching again.</span>
						</div>
					</td>
				</tr>
			@endif
		@else
        @if(!empty($categories))
			@foreach($categories as $result)
				<tr class="result hover:bg-gray-100">
					<td class="p-4">
						<div class="product-info">
                            <h4 class="font-bold">
                                <a href="{{ route('dashboard-categories-show','catId='.$result['id']) }}">
                                    <span>{{ $result['name'] }}</span>
                                </a>
                            </h4>
						</div>
					</td>
					<td class="p-4">
						<div class="product-action">
							<button class="btn editProduct bg-blue-400 hover:bg-blue-500 text-center text-white ml-2" role="button" wire:click="selectItem({{ $result['id'] }}, 'edit')">
							<i class="fas fa-plus"></i>
							<span>Edit</span>
							</button>
							<button class="btn deleteProduct bg-red-400 hover:bg-red-500 text-center text-white ml-2" role="button" wire:click="selectItem({{ $result['id'] }}, 'delete')">
							<i class="fas fa-trash"></i>
							<span>Delete</span>
							</button>
						</div>
					</td>
				</tr>
			@endforeach
        @else
            <tr>
                <td colspan="5">
                    <div class="result error text-center m-3 text-gray-600">
                        <i class="fas fa-exclamation-triangle text-2xl mb-2"></i><br/>
                        <span class="error-text">Whoops! There are no products here. Add some.</span>
                    </div>
                </td>
            </tr>
        @endif
		@endif
	  </tbody>
	</table>

@if(!$updateMode)
<div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" role="dialog" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form>
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <div class="modal-action">
                    <a @click="hideModal" class="close-btn" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="modal-body">
            	<div class="row">
                    <div class="form-group col">
                        <input type="text" pattern="\S+.*" wire:model="productName">
                        <label for="min_stock">Product Name</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="store()" type="submit" class="btn btn-success mt-4">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endif

<div wire:ignore.self class="modal fade" id="addProduct" tabindex="-1" role="dialog" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form>
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <div class="modal-action">
                    <a class="close-btn" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="modal-body">
            	<div class="row">
                    <div class="form-group col">
                        <input type="text" name="name" id="name" required pattern="\S+.*" value="{{ old('name') }}" wire:model="name">
                        <label for="name">What is the product called?</label>
                    </div>
                    <div class="form-group col">
                        <input type="text" name="description" id="description" required pattern="\S+.*" value="{{ old('description') }}" wire:model="description">
                        <label for="description">Description</label>
                    </div>
                </div>
                <div class="form-group">
                    <select name="product_category_id" id="category" required pattern="\S+.*" value="{{ old('product_category_id') }}" wire:model="product_category_id">
                        @foreach ($categories as $category)
                            @if($category['id'] == old('document'))
                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                            @else
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label for="category">Category</label>
                </div>
                <div class="form-group">
                    <input type="text" name="price" id="price" required pattern="\S+.*" value="{{ old('price') }}" wire:model="price">
                    <label for="price">Price</label>
                </div>
                <div class="form-group">
                    <input type="number" name="stock_qty" id="stock_count" required pattern="\S+.*" value="{{ old('stock_qty') }}" wire:model="stock_qty">
                    <label for="stock_count">Stock Count</label>
                </div>
                <div class="form-group">
                    <input type="number" name="minimum_stock" id="min_stock" required pattern="\S+.*" value="{{ old('min_stock') }}" wire:model="min_stock">
                    <label for="min_stock">Minimum Stock</label>
                </div>
                <div class="form-group">
                    <input type="file" name="image" id="input-image" placeholder="Image" value="{{ old('image') }}">
                    <label for="image">Image</label>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="store()" type="submit" class="btn btn-success mt-4">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div wire:ignore.self class="modal fade" id="editProduct" tabindex="-1" role="dialog" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form>
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <div class="modal-action">
                    <a class="close-btn" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="modal-body">
            	<div class="row">
                    <div class="form-group col">
                        <input type="text" name="name" id="name" required pattern="\S+.*" value="{{ old('name') }}" wire:model="name">
                        <label for="name">What is the product called?</label>
                    </div>
                    <div class="form-group col">
                        <input type="text" name="description" id="description" required pattern="\S+.*" value="{{ old('description') }}" wire:model="description">
                        <label for="description">Description</label>
                    </div>
                </div>
                <div class="form-group">
                    <select name="product_category_id" id="category" required pattern="\S+.*" value="{{ old('product_category_id') }}" wire:model="product_category_id">
                        @foreach ($categories as $category)
                            @if($category['id'] == old('document'))
                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                            @else
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label for="category">Category</label>
                </div>
                <div class="form-group">
                    <input type="text" name="price" id="price" required pattern="\S+.*" value="{{ old('price') }}" wire:model="price">
                    <label for="price">Price</label>
                </div>
                <div class="form-group">
                    <input type="number" name="stock_qty" id="stock_count" required pattern="\S+.*" value="{{ old('stock_qty') }}" wire:model="stock_qty">
                    <label for="stock_count">Stock Count</label>
                </div>
                <div class="form-group">
                    <input type="number" name="minimum_stock" id="min_stock" required pattern="\S+.*" value="{{ old('min_stock') }}" wire:model="min_stock">
                    <label for="min_stock">Minimum Stock</label>
                </div>
                <div class="form-group">
                    <input type="file" name="image" id="input-image" placeholder="Image" value="{{ old('image') }}">
                    <label for="image">Image</label>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="store()" type="submit" class="btn btn-success mt-4">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>
