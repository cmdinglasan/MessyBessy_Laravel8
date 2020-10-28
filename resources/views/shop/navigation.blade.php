@extends('shop.app')

@section('shop-top-nav')
<div class="container">
	<div class="messy-t-nav">
		<div class="row">
			<div class="col col-6 left">
				<a onclick="history.back()" class="back-btn">
					<i class="fas fa-arrow-left"></i>
				</a>
				<h3 class="title">Products</h3>
			</div>
			<div class="col col-6 right d-none">
				<div class="cart-item-count">
					<span>1</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col mid">
			</div>
		</div>
		<div class="row">
			<div class="messy-nav-pills">
				<ul class="nav nav-pills nav-justified" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#babycare">Baby Care</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#bathandbody">Bath & Body</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#homecare">Home Care</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#menscare">Men's Care</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection