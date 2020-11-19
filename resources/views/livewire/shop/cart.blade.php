<<<<<<< HEAD
<div>
    <div class="w-2/3 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
            @if(count($cart['products']) > 0)
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Price</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart['products'] as $product)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product->price }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a wire:click="removeFromCart({{ $product->id }})" class="text-green-600 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark cursor-pointer">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-right w-full p-6">
                    <button wire:click="checkout()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Checkout
                    </button>
                    
                </div>
            @else
                <div class="text-center w-full border-collapse p-6">
                    <span class="text-lg">¡Your cart is empty!</span>
                </div>
            @endif
=======
<div class="shop-cart my-10">
    <div class="container">
        <div style="display: none;">{{ $total = 0 }}</div>
        <div class="cart-header">
            <div class="action-bar">
                <a href="{{ route('shop-main') }}" class="block back-btn cursor-pointer rounded-xl bg-gray-100 hover:bg-gray-200 w-10 h-10 text-center leading-10">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
            <div class="cart-title mt-4">
                <h2 class="text-3xl font-black">Cart</h2>
            </div>
>>>>>>> b4805e0fd2482ef8388905c03fd706c067caaee5
        </div>
        @if(count($cart['products']) > 0)
            <div class="cart-items flex">
                <div class="container">
                @foreach($cart['products'] as $product)
                    <div class="cart-item flex">
                        <div class="item-image text-center">
                            <img src="{{ asset('storage/'.$product->image) }}" class="h-full"/>
                        </div>
                        <div class="item-info flex-1">
                            <div class="item-name">
                                <span>{{ $product->name }}</span>
                            </div>
                            <div class="item-price flex-1">
                                <span>₱ {{ $product->price }}</span>
                            </div>
                        </div>
                        {{--
                        <div class="item-qty flex-1">
                            <span>{{ $product->qty }}</span>
                        </div>
                        --}}
                        <div class="item-actions text-right flex-1">
                            <div class="block back-btn cursor-pointer rounded-xl bg-red-500 hover:bg-red-600 w-10 h-10 text-center leading-10 text-white" wire:click="removeFromCart({{ $product->id }})">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                    </div>
                    <div style="display: none;">{{ $total += $product->price }}</div>
                @endforeach
                </div>
            </div>
            <div class="cart-footer">
                <div class="container flex">
                    <div class="cart-summary flex-1">
                        <span>Total</span>
                        <h3>₱ {{ $total }}</h3>
                    </div>
                    <div class="cart-checkout flex-1">
                        <button class="checkout">Checkout</button>
                    </div>
                </div>
            </div>
        @else
            <div class="cart-error">
                <span>Walang laman</span>
            </div>
        @endif
    </div>
</div>
