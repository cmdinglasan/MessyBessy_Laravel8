<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Categories
		</div>
		<div class="header-subtitle">
			Configure the product categories.
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

		<table class="table-auto sortable w-100">
		  <thead class="sticky top-0">
		    <tr class="border-b border-gray-100">
		      <th class="p-4 text-blue-500 uppercase">Product Name</th>
		      <th class="p-4 text-blue-500 uppercase">Category</th>
		      <th class="p-4 text-blue-500 uppercase">Price</th>
		    </tr>
		  </thead>
		  <tbody>
			@if(!empty($query))
				@if(!empty($categories))
					@foreach($categories as $result)
					<div class="result">
						<div class="product-photo">
							<img src="{{ asset('img/products/'.$result['image']) }}">
						</div>
						<div class="product-info">
							<h4>{{ $result['name'] }}</h4>
							<span>Php {{ $result['price'] }}</span>
						</div>
						<div class="product-action">
							<button class="btn addProduct">
								<i class="fas fa-plus"></i>
							</button>
						</div>
					</div>
					@endforeach
				@else
					<div class="result error">
						<span class="error-text">No results found. Try searching again.</span>
					</div>
				@endif
			@else
				<h3 class="results-title">
					All Products
				</h3>
			@endif
		  </tbody>
		</table>
	</div>
</div>