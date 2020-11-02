@if(!empty($products))
	@foreach($products as $product)
<div class="db-card-header bg-gray-100 py-0">
	<div class="container relative overflow-hidden">
		<div class="header-title md:pt-20 md:pb-10">
			{{ $product['name'] }}
		</div>
		<div class="header-subtitle">
		</div>
		<div class="header-action pb-10">
			<button class="border-0 text-gray-800 bg-white hover:bg-gray-300 py-2 px-3 rounded font-bold mr-3" wire:click="updateShowModal()">
				<i class="fas fa-pencil mr-3"></i>
				<span>Update</span>
			</button>
			<button class="border-0 text-white bg-red-600 hover:bg-red-700 py-2 px-3 rounded font-bold" wire:click="deleteShowModal()">
				<i class="fas fa-trash mr-3"></i>
				<span>Delete</span>
			</button>
		</div -->
		<div class="header-image absolute top-0 right-0">
			<img src="{{ asset('img/products/'.$product['image']) }}"/>
		</div>
		@if($modalFormVisible == 1)
		<div class="header-modal">
			<div class="background" wire:click="updateHideModal()"></div>
			<div class="container relative z-10 bg-white p-10 rounded shadow-2xl max-w-md">
				<div class="header-modal-title mb-3">
					<h2 class="text-gray-700 text-2xl font-bold">Edit Product</h2>
				</div>
				<form wire:submit.prevent="update">
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">Product Name</label>
						<input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ old($product['name']) }}">
			            @error('name')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
			        <div class="form-group">
						<label for="price" class="uppercase font-bold text-xs text-gray-400">Price</label>
						<input type="text" wire:model="price" class="form-control @error('price') is-invalid @enderror" placeholder="{{ old($product['price']) }}">
			            @error('price')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
			        <div class="form-group">
		            	<button type="submit" class="btn btn-primary">UPDATE</button>
		            </div>
	        	</form>
	        </div>
        </div>
        @else
        @endif

		@if($modalDelete == 1)
		<div class="header-modal modal-delete">
			<div class="background" wire:click="deleteHideModal()"></div>
			<div class="container relative z-10 bg-red-500 p-10 rounded shadow-2xl max-w-md">
				<div class="header-modal-title mb-3">
					<h2 class="text-white text-2xl font-bold">Delete Product</h2>
				</div>
				<form wire:submit.prevent="delete">
					<div class="form-group">
						<div class="header-modal-subtitle text-white">
							<span>Are you sure you want to delete <br/><strong>{{ $product['name'] }}</strong> ?</span>
						</div>
			        </div>
			        <div class="form-group text-right pt-3">
		            	<a wire:click="deleteHideModal()" class="btn bg-gray-100 text-gray-800 font-bold mr-3 hover:bg-gray-300">No, cancel</a>
		            	<button type="submit" class="btn btn-danger font-bold">Yes, I'm sure</button>
		            </div>
	        	</form>
	        </div>
        </div>
        @else
        @endif
        <div class="item-overview-nav">
        	<ul class="nav nav-tabs border-0">
			  <li>
			  	<a data-toggle="tab" href="#overview" class="active">Overview</a>
			  </li>
			  <li>
			  	<a data-toggle="tab" href="#details">Details</a>
			  </li>
			  <li>
			  	<a data-toggle="tab" href="#activity">Activity</a>
			  </li>
			</ul>
        </div>
	</div>
</div>
<div class="db-content">
	<div class="container">

		<div class="tab-content">
			<!-- First Tab -->
		  	<div id="overview" class="tab-pane fade in active show">
		    	@include('dashboard.inventory.products.modules.overview')
			</div>

		  	<!-- Second Tab -->
			<div id="details" class="tab-pane fade">
			    @include('dashboard.inventory.products.modules.details')
			</div>

		  	<!-- Third Tab -->
		 	<div id="activity" class="tab-pane fade">
			    @include('dashboard.inventory.products.modules.activity')
		  	</div>
		</div>

		<!-- Modal -->
		

	</div>
</div>
	@endforeach
@else
<div class="db-card-header db-card-header-blue py-0">
	<div class="container relative overflow-hidden">
		<div class="header-title md:pt-20">
			No product found
		</div>
		<div class="header-subtitle pb-10">
			Try again.
		</div>
	</div>
</div>
@endif
