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
            {{ $products->links() }}
        </div>
        @endforeach
    @endif
</div>
