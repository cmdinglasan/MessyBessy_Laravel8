<!-- Statistics -->

<div class="product-stats flex flex-wrap gap-4">
	<!-- Products Sold -->
	<div class="product-info product-level-count rounded bg-gray-200 p-4 w-full md:flex-1 text-gray-800 relative">
		<div class="product-info-title font-bold">
			Items Sold
		</div>
		<div class="product-info-value text-5xl font-bold mt-3">
			72
		</div>
		<div class="product-info-icon text-black opacity-25 text-6xl absolute top-2 right-4">
			<i class="fas fa-exclamation-circle"></i>
		</div>
	</div>

	<!-- Products Sold Amount -->
	<div class="product-info product-level-count rounded bg-green-400 p-4 w-full md:flex-1 text-white relative">
		<div class="product-info-title font-bold">
			Sold Amount
		</div>
		<div class="product-info-value text-5xl font-bold mt-3">
			₱ {{ 72 * $product['price'] }}
		</div>
		<div class="product-info-icon text-black opacity-25 text-6xl absolute top-2 right-4">
			<i class="fas fa-money-bill-wave"></i>
		</div>
	</div>

	<!-- Products In Stock -->
	<div class="product-info product-stock-count relative rounded overflow-hidden p-4 w-full md:flex-1 text-white
	@if($product['stock_qty'] < $product['minimum_stock'])
		bg-red-500
	@elseif($product['stock_qty'] == $product['minimum_stock'])
		bg-red-500
	@elseif($product['stock_qty'] <= round($product['minimum_stock'] * 0.25 + $product['minimum_stock']))
		bg-yellow-400 
	@else 
		bg-blue-500
	@endif">
		<div class="product-info-title font-bold">
			In Stock
		</div>
		<div class="product-info-value text-5xl text-white font-bold mt-3">
			{{ $product['stock_qty']}}
		</div>
		<div class="product-info-icon text-black opacity-25 text-6xl absolute top-2 right-4">
			@if($product['stock_qty'] < $product['minimum_stock'])
				<i class="fas fa-exclamation-circle"></i>
			@elseif($product['stock_qty'] == $product['minimum_stock'])
				<i class="fas fa-exclamation-circle"></i>
			@elseif($product['stock_qty'] <= round($product['minimum_stock'] * 0.25 + $product['minimum_stock']))
				<i class="fas fa-exclamation-triangle"></i>
			@else
				<i class="fas fa-cubes"></i>
			@endif
		</div>
	</div>

	<!-- Product Alert Level -->
	<div class="product-info product-level-count rounded bg-red-500 p-4 w-full md:flex-1 text-white relative">
		<div class="product-info-title font-bold">
			Alert Level
		</div>
		<div class="product-info-value text-5xl text-white font-bold mt-3">
			{{ $product['minimum_stock']}}
		</div>
		<div class="product-info-icon text-black opacity-25 text-6xl absolute top-2 right-4">
			<i class="fas fa-exclamation-circle"></i>
		</div>
	</div>
</div>