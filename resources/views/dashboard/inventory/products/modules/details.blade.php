<div class="product-details">
	<div class="header relative">
		<div class="title text-2xl font-bold">
			Product Details
		</div>
	</div>

	@if($modalFormVisible == 1)
		Test
	@else
	<div class="item-form my-3">
		<div class="form-group">
			<label for="name" class="text-xs uppercase text-gray-400 font-bold">Product Name</label>
			<h4>{{ $product['name'] }}</h4>
		</div>
		<div class="form-group">
			<label for="price" class="text-xs uppercase text-gray-400 font-bold">Price</label>
			<h4>{{ $product['price'] }}</h4>
		</div>
		<div class="form-group">
			<label for="price" class="text-xs uppercase text-gray-400 font-bold">Category</label>
			@foreach($categories as $category)
				<h4>{{ $category['name'] }}</h4>
			@endforeach
		</div>
	</div>
	@endif

</div>