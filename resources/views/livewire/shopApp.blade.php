<div class="product-items row">
    @foreach($products as $product)            
    <div class="product-item col-lg-4 col-md-6 m-2 no-gutters">
        <div class="item-info">
            <div class="item-main-info">
                <h4 class="item-name">
                    {{ $product->name }}
                </h4>
                <span class="item-weight">
                    240ml
                </span>
            </div>
            <span class="item-price">
                @if(isset($product->price))
                    Php {{ $product->price }}
                @else
                    No Price
                @endif
            </span>
            <img class="item-image" src="{{url('img/products/')}}/{{ $product->image }}"/>
        </div>
    </div>
    @endforeach
</div>
