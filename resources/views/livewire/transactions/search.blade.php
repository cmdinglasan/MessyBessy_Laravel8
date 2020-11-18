<div class="container">
<div class="col text-right">
                        <a type="button" class="btn barcode-btn" title="Scan Product Code">
                            <i class="far fa-qrcode"></i>
                        </a>
                        <div class="search-input">
                        <div class="icon search">
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" placeholder="Search for products" maxlength="100" wire:model="query"/>
                    </div>
</div>
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
        <div>
            <div class="flex justify-end mt-5 absolute w-full bottom-0 left-0 pb-5">
                <button wire:click="addToCart({{ $product->id }})" class="block uppercase font-bold text-green-600 hover:text-green-500 mr-4">
                    Add to cart
                </button>
            </div>
        </div>
            <img class="item-image" src="{{ asset('storage/'.$product->image) }}"/>
            {{ $products->links() }}
        </div>
    </div>
    @endforeach
</div>
</div>
