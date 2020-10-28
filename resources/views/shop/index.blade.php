@extends('shop.app')

@section('content')
<div class="transaction-content">
    <div class="transaction-container">
        <div class="transaction-shop">
            <div class="shop-header">
                <!-- Shop Header -->
                <div class="header-actions header-top">
                    <a href="/home" type="a" class="btn search-btn" exact>
                        <i class="far fa-home"></i>
                        <span>Home</span>
                    </a>
                </div>
                <div class="header-title">
                    <h1>Messy Products</h1>
                    <h5>Store ID: <span id="branch-location">Messy-MOA</span></h5>
                </div>
                <div class="header-actions header-right">
                    <button type="button" class="btn search-btn">
                        <i class="far fa-search"></i>
                        <span>Search</span>
                    </button>
                    <button type="button" class="btn barcode-btn">
                        <i class="far fa-barcode"></i>
                        <span>Scan</span>
                    </button>
                </div>
            </div>
            <div class="shop-body">
                <!-- List of products -->
                <div class="product-categories row">
                    <a href="?cat=$" class="category-item col">
                        <div class="item-info">
                            <div class="item-main-info">
                                <h6 class="item-name">
                                    {{ 'category.name' }}
                                </h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="product-items row">
                    @livewire('shop-app')
                </div>
            </div>
        </div>
        <div class="transaction-cart">
            <div class="cart-content">
                <div class="cart-header">
                    <h2 class="title">Cart</h2>
                </div>
                <div class="cart-items">
                </div>
                <div class="cart-details">
                    <div class="cart-details-content">

                    </div>
                    <div class="cart-checkout">
                        <div class="checkout-type">
                            <div class="credit-info">
                            </div>
                            <div class="credit-type">
                                <button type="button">Change</button>
                            </div>
                        </div>
                        <button type="submit">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</div>
@endsection