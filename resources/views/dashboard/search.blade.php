<div class="search-pane-content">
	<div class="search-box p-4">
		<div class="container flex">
			<div class="close-btn w-15 h-15 p-2 text-gray-800 rounded hover:bg-gray-200 mr-3 cursor-pointer" x-show="subSearch">
				<i class="fas fa-times mr-3"></i>
			</div>
			<div class="search-input bg-gray-100 flex-auto rounded">
				<div class="icon w-8 hidden">
					<i class="fas fa-search"></i>
				</div>
				<div class="search w-full">
					<input type="text" class="h-14 outline-none px-3 flex-auto" wire:model="query" placeholder="Search here">
				</div>
			</div>
		</div>
	</div>
	<div class="container">
	@if(!empty($query))
		<div class="search-results relative top-18 left-0 w-full bg-white p-4 z-10" x-show="isOpen">
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
						<div class="product-photo inline-block h-10 w-10 text-center mr-2">
							<img src="{{ asset('storage/'.$product['image']) }}" class="h-10">
						</div>
						<div class="product-info inline-block">
							<h4 class="font-bold text-gray-700">{{ $product['name'] }}</h4>
							<span class="text-sm">Php {{ $product['price'] }}</span>
						</div>
					</div>
				</a>
				@endforeach
			@endif
			@if(!empty($users))
				<h5 class="results-subtitle text-xs text-gray-400 font-bold">
					In Employees
				</h5>
				@foreach($users as $user)
				<a href="{{ route('dashboard-employees-index', 'userID='. $user['id']) }}" class="hover:no-underline">
					<div class="result my-3 p-3 rounded hover:bg-gray-100">
						<div class="result-info">
							<div class="result-photo inline-block h-10 w-10 text-center mr-2 align-top">
								<img class="h-10 w-10 rounded-full object-cover" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
							</div>
							<div class="product-info inline-block align-top ">
								<h4 class="font-bold text-gray-700 ">{{ $user['name'] }}</h4>
								<span class="text-sm">Employee</span>
							</div>
						</div>
					</div>
				</a>
				@endforeach
			@endif
			@if(empty($products) && empty($users))
				<h5 class="result">
					<span>No results found. Try again with a different query.</span>
				</h5>
			@endif
		</div>
	@else
	@endif
	</div>
</div>
