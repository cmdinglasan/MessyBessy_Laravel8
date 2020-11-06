<div class="db-card-header db-card-header-green" x-data="{ addModal: false }">
	<div class="container">
		<div class="header-title">
			Products
		</div>
		<div class="header-subtitle">
			Check all your Messy products.
		</div>
		<div class="header-action">
			<a x-on:click="addModal = true" class="btn header-btn">
				Add Product
			</a>
		</div>
		<div class="header-image">
		</div>
		<div class="header-modal" x-show.transition="addModal" style="display: none;">
			<div class="background" x-on:click="addModal = false"></div>
			<div class="container relative z-10 bg-white p-10 rounded shadow-2xl max-w-md" x-data="{ isUploading: false, progress: 0 }"x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
				<div class="header-modal-title mb-3">
					<h2 class="text-gray-700 text-2xl font-bold">Add Product</h2>
				</div>
				<form wire:submit.prevent="store">
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">Product Name</label>
						<input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Product Name">
			            @error('name')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="description" class="uppercase font-bold text-xs text-gray-400">Description</label>
						<input type="text" wire:model="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">
			            @error('description')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<span class="uppercase font-bold text-xs text-gray-400">Image</span><br/>

						<input type="file" id="image" wire:model="image" class="form-control @error('image') is-invalid @enderror" hidden>
						@if ($image)
							<div class="text-center">
					        	<img src="{{ $image->temporaryUrl() }}" class="h-24 mb-3 inline-block" alt="Product Image" title="Product Image"><br/>
					        	<label for="image" class="btn btn-primary">
						        	<i class="fad fa-spinner-third animate-spin text-white text-sm mr-2" x-show="isUploading"></i>
						        	<span>Change Photo</span>
						        </label>
						    </div>
					    @else
							<label for="image" class="uppercase font-bold text-xs text-gray-400 border-dashed border-2 rounded block mt-2 p-3 text-center cursor-pointer hover:bg-gray-100">
								<div x-show="isUploading">
									<i class="fad fa-spinner-third animate-spin text-2xl mb-2"></i>
							    </div>
								<span>Click to Upload Image</span>
							</label>
					    @endif
			            @error('image')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="category" class="uppercase font-bold text-xs text-gray-400">Category</label>
						<select wire:model="category" class="form-control @error('category') is-invalid @enderror" placeholder="Description">
						@if(!empty($categories))
							@foreach ($categories as $category)
	                            @if($category['id'] == old('document'))
	                                <option value="{{$category['id']}}" selected="">{{$category['name']}}</option>
	                            @else
	                                <option value="{{$category['id']}}">{{$category['name']}}</option>
	                            @endif
	                        @endforeach
	                    @else
	                    	<option>No categories available</option>
	                    @endif
						</select>
			            @error('category')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
			        <div class="form-group">
						<label for="price" class="uppercase font-bold text-xs text-gray-400">Price</label>
						<input type="text" wire:model="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
			            @error('price')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
			        <div class="form-group">
						<label for="price" class="uppercase font-bold text-xs text-gray-400">Stock Level</label>
						<input type="text" wire:model="stock_qty" class="form-control @error('stock_qty') is-invalid @enderror" placeholder="Stock Quantity">
			            @error('stock_qty')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
			        <div class="form-group">
						<label for="price" class="uppercase font-bold text-xs text-gray-400">Stock Alert Level</label>
						<input type="text" wire:model="min_stock" class="form-control @error('min_stock') is-invalid @enderror" placeholder="Stock Alert Level">
			            @error('min_stock')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
			        <div class="form-group">
		            	<button type="submit" class="btn btn-primary">Add</button>
		            </div>
	        	</form>
	        </div>
        </div>
	</div>
</div>
<div class="db-content">
	<div class="container">
		
		<!-- Search -->
		@livewire('dashboard.inventory.products.module.search-products')
		<!-- End of Search -->

	</div>
</div>