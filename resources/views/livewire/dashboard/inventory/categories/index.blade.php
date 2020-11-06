<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Categories
		</div>
		<div class="header-subtitle">
			Configure the product categories.
		</div>
		<div class="header-action">
			<a wire:click="showAddForm()" class="btn header-btn">
				Add Category
			</a>
		</div>
		<div class="header-image">
		</div>

		@if($addForm == 1)
		<div class="header-modal">
			<div class="background" wire:click="hideAddForm()"></div>
			<div class="container relative z-10 bg-white p-10 rounded shadow-2xl max-w-md">
				<div class="header-modal-title mb-3">
					<h2 class="text-gray-700 text-2xl font-bold">Add Category</h2>
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
		<livewire:dashboard.inventory.categories.module.search wire.model="element"/>
		<!-- End of Search -->

	</div>
</div>