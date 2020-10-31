<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Products
		</div>
		<div class="header-subtitle">
			Check all your Messy products.
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
		      <th class="p-4 text-blue-500 uppercase"></th>
		      <th class="p-4 text-blue-500 uppercase">Product Name</th>
		      <th class="p-4 text-blue-500 uppercase">Category</th>
		      <th class="p-4 text-blue-500 uppercase">Price</th>
		    </tr>
		  </thead>
		  <tbody>

		  @if(!empty($query))
		  	@if(!empty($results))
			  	@foreach($results as $result)
				    <tr class="border-b border-gray-100 hover:bg-gray-100">
				      <td class="border px-4 border-0 w-20">
				      	<img src="{{ asset('img/products/'.$result['image']) }}" class="w-8"/>
				      </td>
				      <td class="border p-4 border-0">{{ $result['name'] }}</td>
				      <td class="border p-4 border-0">{{ $result['product_category_id'] }}</td>
				      <td class="border p-4 border-0">{{ $result['price'] }}</td>
				    </tr>
			    @endforeach
			@else
				<tr>
					<div class="result error">
						<span class="error-text">No results found. Try searching again.</span>
					</div>
				</tr>
			@endif
		@else
		  	@foreach($products as $product)
			    <tr class="border-b border-gray-100 hover:bg-gray-100">
			      <td class="border px-4 border-0 w-20">
			      	<img src="{{ asset('img/products/'.$product['image']) }}" class="w-8"/>
			      </td>
			      <td class="border p-4 border-0">{{ $product['name'] }}</td>
			      <td class="border p-4 border-0">{{ $product['product_category_id'] }}</td>
			      <td class="border p-4 border-0">{{ $product['price'] }}</td>
			    </tr>
		    @endforeach
		@endif
		  </tbody>
		</table>
	</div>
</div>