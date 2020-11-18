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
                </div>
                <div class="item-image absolute bottom-0 right-0 h-full sm:block sm:w-20 text-center w-20">
                    <img class="h-full inline-block" src="{{ asset('storage/'.$product->image) }}"/>
                </div>
                <span class="item-price">
                    @if(isset($product->price))
                        Php {{ $product->price }}
                    @else
                        No Price
                    @endif
                </span>
                <div>
                    <img class="item-image" src="{{ asset('storage/'.$product->image) }}"/>
                    {{ $products->links() }}
                </div>
                <div class="flex justify-end mt-5 absolute w-full bottom-0 left-0 pb-5">
                    <button wire:click="addToCart({{ $product->id }})" class="block uppercase font-bold text-green-600 hover:text-green-500 mr-4">
                        Add to cart
                    </button>
                </div>
            </div>
            @endforeach
        @endif
    @endif
</div>
