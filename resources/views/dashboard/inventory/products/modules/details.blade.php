<div class="product-details">
	<div class="header relative">
		<div class="title text-2xl font-bold">
			Product Details
		</div>
		<div class="action">
			<button wire:model="updateShowModal" class="btn">
				<i class="fas fa-pencil"></i>
				<span>Update</span>
			</button>
		</div>
	</div>

	@if($modalFormVisible == 1)
		Test
	@else
	<div class="item-form my-10">
		<div class="form-group">
			<label for="name" class="text-xs uppercase text-gray-400 font-bold">Product Name</label>
			<h4>{{ $product['name'] }}</h4>
		</div>
	</div>
	@endif

</div>