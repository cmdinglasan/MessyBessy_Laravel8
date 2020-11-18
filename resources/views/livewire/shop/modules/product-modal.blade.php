@foreach($products as $item)
<div class="product-modal fixed top-0 md:relative shadow-lg md:m-4  md:rounded-2xl w-full md:w-2/3 h-screen md:h-auto mx-auto transition text-gray-700">
	<div class="product-header relative">
		<div class="container p-0 m-0">
	    	<div class="action-bar">
	    		<div class="back-btn cursor-pointer rounded-xl bg-gray-100 hover:bg-gray-200 w-10 h-10 text-center leading-10">
	    			<i class="fas fa-chevron-left"></i>
	    		</div>
	    	</div>
	    	<div class="product-image w-full">
	    		<div class="image text-center mx-auto">
	    			<img src="{{ asset('storage/'.$item->image) }}"/>
	    		</div>
	    	</div>
	    </div>
	</div>
	<div class="product-main">
		<div class="product-name text-center">
			<h2 class="text-2xl font-900">{{ $item->name }}</h2>
		</div>
	</div>
    <div class="checkout md:px-6 md:py-4 absolute bottom-0 w-full">
    	<button type="button" class="addToCart-btn p-3 w-full md:rounded-full font-bold outline-none">
    		<i class="fad fa-shopping-basket mr-2"/></i> Add to Cart
    	</button>
    	
    </div>
</div>
@endforeach
