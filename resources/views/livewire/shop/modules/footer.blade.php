<div class="shop-footer">
    <div class="container">
        <div class="row navigation nav nav-tabs" role="tablist">
            <div class="col">
                <a wire:ignore.self href="{{ route('shop-main') }}" class="footer-btn @if(Route::is('shop-main')) active @endif" aria-controls="home" role="tab" data-toggle="tab">
                    <i class="far fa-home"></i>
                    <span class="hidden sm:inline-block">Home</span>
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