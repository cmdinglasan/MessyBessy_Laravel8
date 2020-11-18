<div class="shop-header">
	<div class="container">
		<div class="header-nav flex" x-data="{ search: false }">
			<div class="input-form-alias rounded-2xl bg-gray-100 flex-auto p-3 h-14 mr-3" x-on:click="search = true">
				<div class="icon inline-block mr-2">
					<i class="fas fa-search"></i>
				</div>
				<div class="search inline-block">
					<input type="text" wire:model="query" placeholder="Search here..."/>
					<span x-show.transition="search">Test</span>
				</div>
			</div>
			<a href="#" class="w-14 mr-3">
				<div class="nav-link bg-gray-100 rounded-2xl">
					<i class="fas fa-shopping-cart"></i>
				</div>
			</a>
			<a href="#" class="w-14">
				<div class="nav-link bg-gray-100 rounded-2xl">
					<i class="fas fa-bars"></i>
				</div>
			</a>
		</div>
	</div>
</div>
