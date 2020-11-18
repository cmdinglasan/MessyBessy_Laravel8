<div class="shop-footer">
    <div class="container">
        <div class="row navigation nav nav-tabs" role="tablist">
            <div class="col">
                <a wire:ignore.self href="{{ route('shop-main') }}" class="footer-btn active" aria-controls="home" role="tab" data-toggle="tab">
                    <i class="far fa-home"></i>
                    <span>Home</span>
                </a>
            </div>
            <div class="col">
                <a wire:ignore.self href="{{ route('shop-cart') }}" class="footer-btn" aria-controls="cart" role="tab" data-toggle="tab">
                    <i class="far fa-shopping-cart"></i>
                    <span>Cart</span>
                    <div class="count">
                        {{ $cartTotal }}
                    </div>
                </a>
            </div>
            <div class="col">
                <a wire:ignore.self href="#alerts" class="footer-btn" aria-controls="alerts" role="tab" data-toggle="tab">
                    <i class="far fa-bell"></i>
                    <span>Alerts</span>
                </a>
            </div>
            <div class="col">
                <a wire:ignore.self href="#profile" class="footer-btn" aria-controls="profile" role="tab" data-toggle="tab">
                    <i class="far fa-user"></i>
                    <span>Profile</span>
                </a>
            </div>
        </div>
    </div>
</div>