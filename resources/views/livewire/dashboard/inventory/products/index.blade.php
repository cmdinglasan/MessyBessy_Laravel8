<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Products
		</div>
		<div class="header-subtitle">
			Check all your Messy products.
		</div>
		<div class="header-action">
			<a href="#settings" class="btn header-btn">
				Go to settings
			</a>
		</div>
		<div class="header-image">
		</div>
	</div>
</div>
<div class="db-content">
	<div class="container">
		<div class="">
			<input type="text" class="form-input w-100" wire:model="query" placeholder="Search"/>
		</div>

		<div class="actions flex my-3 text-right relative h-6">
			<div class="absolute top-0 right-0">
				<button type="button" class="btn btn-primary ml-2 bg-blue-500 hover:bg-blue-600" data-toggle="modal" data-target="#addProduct">
					<i class="fas fa-plus mr-1"></i>
					<span>Add</span>
				</button>
			</div>
		</div>

		<table class="table-auto sortable w-100">
		  <thead class="sticky top-0">
		    <tr class="border-b border-gray-100">
		      <th class="p-4 text-blue-500 uppercase"></th>
		      <th class="p-4 text-blue-500 uppercase">Product Name</th>
		      <th class="p-4 text-blue-500 uppercase">Category</th>
		      <th class="p-4 text-blue-500 uppercase">Price</th>
		      <th class="p-4 text-blue-500 uppercase"></th>
		    </tr>
		  </thead>
		  <tbody>

		  @if(!empty($query))
		  	@if(!empty($results))
			  	@foreach($results as $result)
				    <tr class="border-b border-gray-100 hover:bg-gray-100">
					    <td class="border px-4 border-0 w-20">
					      	<img src="{{ asset('img/products/'.$result['image']) }}" class="w-8"/>
					    </td>
					    <td class="border p-4 border-0">{{ $result['name'] }}</td>
					    <td class="border p-4 border-0">{{ $result['product_category_id'] }}</td>
					    <td class="border p-4 border-0">{{ $result['price'] }}</td>
					    <td class="border p-4 border-0">
					      	<button type="button" class="btn btn-primary ml-2 bg-blue-500 hover:bg-blue-600" data-toggle="modal" data-target="#addProduct">
								<i class="fas fa-plus mr-1"></i>
								<span>Add</span>
							</button>
						</td>
				    </tr>
			    @endforeach
			@else
				<tr>
					<div class="result error">
						<span class="error-text">No results found. Try searching again.</span>
					</div>
				</tr>
			@endif
		@else
		  	@foreach($products as $product)
			    <tr class="border-b border-gray-100 hover:bg-gray-100">
			    <td class="border px-4 border-0 w-20">
			      	<img src="{{ asset('img/products/'.$product['image']) }}" class="w-8"/>
			    </td>
			    <td class="border p-4 border-0">{{ $product['name'] }}</td>
			    @foreach($categories as $category)
			      	@if($product['product_category_id']==$category['id'])
			      		<td class="border p-4 border-0">{{ $category['name'] }}</td>
			      	@endif
			    @endforeach
			    <td class="border p-4 border-0">{{ $product['price'] }}</td>
				    <td class="border p-4 border-0">
				      	<button type="button" class="btn btn-primary ml-2 bg-blue-500 hover:bg-blue-600" wire:click="">
							<i class="fas fa-pencil mr-1"></i>
							<span>Edit</span>
						</button>
				      	<button type="button" class="btn btn-error ml-2 bg-red-500 text-white hover:bg-red-600" data-toggle="modal" data-target="#addProduct">
							<i class="fas fa-trash mr-1"></i>
							<span>Delete</span>
						</button>
					</td>
			    </tr>
		    @endforeach
		@endif
		  </tbody>
		</table>

		<div wire:ignore.self class="modal fade" id="addProduct" tabindex="-1" role="dialog" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                        <div class="modal-action">
                            <a @click="hideModal" class="close-btn" data-dismiss="modal">
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
	</div>
</div>