<div class="shop-content">
	<div class="shop-header">
		<div class="shop-menu">
			<div class="container">
				<div class="row">
					<div class="col">
						<button class="nav-btn">
							<span></span>
						</button>
					</div>
					<div class="col text-right">
						<a type="button" class="btn barcode-btn" title="Scan Product Code">
							<i class="far fa-qrcode"></i>
						</a>
						<a href="{{ route('product-search') }}" type="button" class="btn search-btn" title="Search for Products">
							<i class="fas fa-search"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="shop-greetings">
			<div class="container">
				<h2>Good morning, <br/>{{ $this->user['name'] }}</h2>
			</div>
		</div>
	</div>
	<div class="shop-main">
		<div class="container">
			@livewire('shop-app')
		</div>
	</div>

	<div class="tab-content">
		<div id="cart" class="tab-pane fade">
			#cart
		</div>
		<div id="alerts" class="tab-pane fade">
			#alerts
		</div>
		<div id="profile" class="tab-pane fade">
			#profile
		</div>
	</div>
</div>

<div class="shop-footer">
    <div class="container">
        <div class="row navigation nav nav-tabs" role="tablist">
            <div class="col">
                <a wire:ignore.self href="#" class="footer-btn active" aria-controls="home" role="tab" data-toggle="tab">
                    <i class="far fa-home"></i>
                    <span>Home</span>
                </a>
            </div>
            <div class="col">
                <a wire:ignore.self href="#cart" class="footer-btn" aria-controls="cart" role="tab" data-toggle="tab">
                    <i class="far fa-shopping-cart"></i>
                    <span>Cart</span>
                    @if(isset($productCount))
                    <div class="count">
                    	{{ $productCount }}
                	</div>
                	@endif
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