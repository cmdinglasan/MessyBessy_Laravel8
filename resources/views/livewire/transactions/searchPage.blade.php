<div class="search-form-wrapper">
	<div class="search-form-content">
   		<div class="search-form">
			<div class="container">
				<div class="search-box">
       				<button class="btn icon back" onclick="history.back()">
       					<i class="fas fa-chevron-left"></i>
       				</button>
       				<div class="search-input">
       					<div class="icon search">
       						<i class="fas fa-search"></i>
       					</div>
       					<input type="text" placeholder="Search for products" maxlength="100" wire:model="query"/>
       				</div>
       			</div>
   			</div>
		</div>
		<div class="search-results">
			<div class="container">
				@if(!empty($query))
					@if(!empty($results))
						<h3 class="results-title">
							Results
						</h3>
						@foreach($results as $result)
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
					@foreach($products as $product)
						<div class="result">
							<div class="product-photo">
								<img src="{{asset('img/products/'.$product['image'])}}">
							</div>
							<div class="product-info">
								<h4>{{ $product['name'] }}</h4>
								<span>Php {{ $product['price'] }}</span>
							</div>
							<div class="product-action">
								<button class="btn addProduct">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</div>