@foreach($products as $product)            
<div class="product-item col-4">
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
            Php {{ $product->price }}
        </span>
        <img class="item-image" src="{{url('img/products/')}}/{{ $product->image }}"/>
    </div>
</div>
@endforeach
