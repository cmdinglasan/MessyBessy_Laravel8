<div class="shop-content">
	@livewire('transactions.header')
	<div class="container">
		<div class="shop-main">
			<div class="shop-greetings">
				<h2>
					@if($time < 12)
						Good morning
					@elseif(($time > 12) && ($time < 18))
						Good afternoon
					@else
						Good evening
					@endif
					<br/>{{ $this->user['name'] }}</h2>
			</div>
			<div class="product-items flex top-items my-4">
			    @if(!empty($query))
			        @if(!empty($products))
			            @foreach($products as $product)            
			            <div class="product-item no-gutters">
			                <div class="item-info relative m-2">
			                    <div class="item-main-info">
			                        <h4 class="item-name">
			                            {{ $product->name }}
			                        </h4>
			                        <span class="item-weight">
			                            240ml
			                        </span>
			                    </div>
			                    <span class="item-price mt-0">
			                        @if(isset($product->price))
			                            Php {{ $product->price }}
			                        @else
			                            No Price
			                        @endif
			                    </span>
			                    <div class="item-image absolute bottom-0 right-0 h-full sm:block sm:w-20 text-center w-20">
			                        <img class="h-full inline-block" src="{{ asset('storage/'.$product->image) }}"/>
			                    </div>
			                </div>
			                {{ $products->links() }}
			            </div>
			            @endforeach
			        @else
			            <span>No results found</span>
			        @endif
			    @else
			        @foreach($products as $product)            
			        <div class="product-item col-lg-4 col-md-6 m-2 no-gutters">
			            <div class="item-info relative">
			                <div class="item-main-info">
			                    <h4 class="item-name">
			                        {{ $product->name }}
			                    </h4>
			                    <span class="item-weight">
			                        240ml
			                    </span>
			                </div>
			                <span class="item-price mt-0">
			                    @if(isset($product->price))
			                        Php {{ $product->price }}
			                    @else
			                        No Price
			                    @endif
			                </span>
			                <div class="item-image absolute bottom-0 right-0 h-full sm:block sm:w-20 text-center w-20">
			                    <img class="h-full inline-block" src="{{ asset('storage/'.$product->image) }}"/>
			                </div>
			            </div>
			        </div>
			        @endforeach
			    @endif
			</div>
			@livewireScripts
		</div>

		<div class="tab-content">
			<div id="cart" class="tab-pane fade">
				#cart
			</div>
			<div id="alerts" class="tab-pane fade">
				#alerts
			</div>
			<div id="profile" class="tab-pane fade">
				#profile
			</div>
		</div>
	</div>
</div>

<div class="shop-footer">
    <div class="container">
        <div class="row navigation nav nav-tabs" role="tablist">
            <div class="col">
                <a wire:ignore.self href="#" class="footer-btn active" aria-controls="home" role="tab" data-toggle="tab">
                    <i class="far fa-home"></i>
                    <span class="hidden sm:inline-block">Home</span>
                </a>
            </div>
            <div class="col">
                <a wire:ignore.self href="#cart" class="footer-btn" aria-controls="cart" role="tab" data-toggle="tab">
                    <i class="far fa-shopping-cart"></i>
                    <span class="hidden sm:inline-block">Cart</span>
                    @if(isset($productCount))
                    <div class="count">
                    	{{ $productCount }}
                	</div>
                	@endif
                </a>
            </div>
            <div class="col">
                <a wire:ignore.self href="#alerts" class="footer-btn" aria-controls="alerts" role="tab" data-toggle="tab">
                    <i class="far fa-bell"></i>
                    <span class="hidden sm:inline-block">Alerts</span>
                </a>
            </div>
            <div class="col">
                <a wire:ignore.self href="#profile" class="footer-btn" aria-controls="profile" role="tab" data-toggle="tab">
                    <i class="far fa-user"></i>
                    <span class="hidden sm:inline-block">Profile</span>
                </a>
            </div>
        </div>
    </div>
</div>