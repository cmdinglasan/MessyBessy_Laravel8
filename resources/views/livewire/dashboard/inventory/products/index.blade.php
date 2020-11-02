<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Products
		</div>
		<div class="header-subtitle">
			Check all your Messy products.
		</div>
		<div class="header-action">
			<a wire:click="showAddForm()" class="btn header-btn">
				Add Product
			</a>
		</div>
		<div class="header-image">
		</div>
		@if($addForm == 1)
		<div class="header-modal">
			<div class="background" wire:click="hideAddForm()"></div>
			<div class="container relative z-10 bg-white p-10 rounded shadow-2xl max-w-md">
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
						<label for="category" class="uppercase font-bold text-xs text-gray-400">Category</label>
						<select wire:model="product_category_id" class="form-control @error('category') is-invalid @enderror" placeholder="Description">
						@foreach ($categories as $category)
                            @if($category['id'] == old('document'))
                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                            @else
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endif
                        @endforeach
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
						<input type="text" wire:model="stock_defective" class="form-control @error('stock_defective') is-invalid @enderror" placeholder="Stock Alert Level">
			            @error('stock_defective')
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
        @else
        @endif
	</div>
</div>
<div class="db-content">
	<div class="container">
		
		<!-- Search -->
		@livewire('dashboard.inventory.products.module.search-products')
		<!-- End of Search -->

		

	</div>
</div>