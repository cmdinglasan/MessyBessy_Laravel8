<div class="search-pane-content">
	<div class="search-box">
		<div class="container">
			<i class="fas fa-search mr-3"></i>
			<input type="text" class="h-14 w-3/4 outline-none" wire:model="query" placeholder="Search here">
		</div>
	</div>
	@if(!empty($query))
		<div class="search-results absolute top-18 left-0 w-full bg-white p-4 z-10 border-b-2 border-gray-100">
			<h3 class="results-title font-bold mb-3">
				Results
			</h3>
			@if(!empty($products))
				<h5 class="results-subtitle text-xs text-gray-400 font-bold">
					In Products
				</h5>
				@foreach($products as $product)
				<a href="{{ route('dashboard-product-show', 'productId='. $product['id']) }}">
					<div class="result my-3 p-3 rounded hover:bg-gray-100">
						<div class="product-photo inline-block h-10 w-10 text-center">
							<img src="{{ asset('img/products/'.$product['image']) }}" class="h-10">
						</div>
						<div class="product-info inline-block">
							<h4 class="font-bold text-gray-700">{{ $product['name'] }}</h4>
							<span class="text-sm">Php {{ $product['price'] }}</span>
						</div>
					</div>
				</a>
				@endforeach
			@endif
			@if(!empty($categories))
				<h5 class="results-subtitle">
					In Categories
				</h5>
				@foreach($categories as $category)
				<div class="result">
					<div class="category-info">
						<h4>{{ $category['name'] }}</h4>
					</div>
				</div>
				@endforeach
			@endif
			@if(empty($products) &&  empty($categories))
				<h5 class="result">
					<span>No results found. Try again with a different query.</span>
				</h5>
			@endif
		</div>
	@else
	@endif
</div>
