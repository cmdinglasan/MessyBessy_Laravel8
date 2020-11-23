<div>
	<div class="shop-content">
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
				
				<div class="product-items sm:flex top-items my-4">
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
				                
				            </div>
				            @endforeach
				        @else
				            <span>No results found</span>
				        @endif
				    @else
				        @foreach($products as $product)            
				        <div class="product-item m-2 no-gutters" wire:click="addToCart({{ $product->id }})" >
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
				
			</div>
		</div>
	</div>
</div>
