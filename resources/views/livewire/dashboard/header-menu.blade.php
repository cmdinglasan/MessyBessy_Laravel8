<div class="header-navigation-wrapper p-4 bg-white z-10 fixed top-0 w-full border-gray-100">
    <div class="header-container flex">
    	<div class="logo-pane w-64 flex-1">
    		<div class="logo leading-10 w-12">
    			<a href="{{ url('/') }}">
    				<img src="{{ asset('img/icon.png') }}" class="h-12"/>
    			</a>
    		</div>
    	</div>
    	<div class="nav-pane flex-1" x-data="{ subInventory: false, subSearch: false, subSidebar: false }">
    		<div class="navigation hidden md:flex relative items-stretch">
    			<a href="{{ route('shop-dashboard') }}" title="Dashboard" class="flex-auto hover:no-underline">
    				<div class="nav-link p-3 hover:text-blue-500 rounded mx-3 text-center @if(Route::is('shop-dashboard'))text-blue-500 @else  text-gray-400 @endif">
    					<i class="fas fa-chart-line text-xl"></i>
	    				<span class="ml-2 font-bold"></span>
	    			</div>
    			</a>
    			<div title="Inventory" class="flex-auto hover:no-underline cursor-pointer ">
    				<div class="nav-link p-3 text-gray-400 hover:text-blue-500 rounded mx-3 text-center relative transition" :class="{ 'text-blue-500': subInventory }" @click="subInventory = true">
    					<i class="fas fa-shopping-bag text-xl"></i>
	    				<span class="ml-2 font-bold"></span>
	    				<span class="triangle absolute left-0" x-show.transition="subInventory" style="display: none; bottom: -26px; left: 50%; margin-left: -18px; width: 0; height: 0; border-left: 15px solid transparent; border-right: 15px solid transparent; border-bottom: 15px solid #3f83f8;"></span>
	    			</div>
	    			<div class="sub-nav fixed bg-blue-500 p-4 left-0 w-full cursor-auto" x-show.transition="subInventory" @click.away="subInventory = false" style="display: none; top: 106px;">
	    				<div class="container flex">
		    				<a href="{{ route('dashboard-product-index') }}" title="Products" class="flex-auto hover:no-underline">
			    				<div class="sub-nav-link p-3 text-white rounded mx-3 text-center hover:bg-black hover:bg-opacity-25">
			    					<i class="fas fa-shopping-bag text-xl"></i>
				    				<span class="ml-2 font-bold">Products</span>
			    				</div>
			    			</a>
		    				<a href="{{ route('dashboard-categories-index') }}" title="Categories" class="flex-auto hover:no-underline">
			    				<div class="sub-nav-link p-3 text-white rounded mx-3 text-center hover:bg-black hover:bg-opacity-25">
			    					<i class="fas fa-shopping-bag text-xl"></i>
				    				<span class="ml-2 font-bold">Categories</span>
			    				</div>
			    			</a>
		    				<a href="{{ route('dashboard-stocks-index') }}" title="Stocks" class="flex-auto hover:no-underline">
			    				<div class="sub-nav-link p-3 text-white rounded mx-3 text-center hover:bg-black hover:bg-opacity-25">
			    					<i class="fas fa-shopping-bag text-xl"></i>
				    				<span class="ml-2 font-bold">Stocks</span>
			    				</div>
			    			</a>
			    		</div>
	    			</div>
    			</div>
    			<a href="{{ route('dashboard-branches-index') }}" title="Branches" class="flex-auto hover:no-underline">
    				<div class="nav-link p-3 @if(Route::is('dashboard-branches-index'))text-blue-500 @else  text-gray-400 @endif hover:text-blue-500 rounded mx-3 text-center">
    					<i class="fas fa-store text-xl"></i>
	    				<span class="ml-2 font-bold"></span>
	    			</div>
    			</a>
    			<a href="{{ route('dashboard-employees-index') }}" title="Employees" class="flex-auto hover:no-underline">
    				<div class="nav-link p-3 @if(Route::is('dashboard-employees-index'))text-blue-500 @else  text-gray-400 @endif hover:text-blue-500 rounded mx-3 text-center">
    					<i class="fas fa-user text-xl"></i>
	    				<span class="ml-2 font-bold"></span>
	    			</div>
    			</a>
    			<div title="Search" class="flex-auto hover:no-underline cursor-pointer">
    				<div class="nav-link p-3 text-gray-400 hover:text-blue-500 rounded mx-3 text-center relative transition" :class="{ 'text-blue-500': subSearch }" @click="subSearch = true">
    					<i class="fas fa-search text-xl"></i>
	    				<span class="ml-2 font-bold"></span>
	    			</div>
    			</div>
    		</div>
    		<div class="sidebar-nav md:hidden flex justify-end">
    			<div title="Search" class="hover:no-underline cursor-pointer">
    				<div class="nav-link p-3 text-gray-400 hover:text-blue-500 rounded mx-3 text-center relative transition w-14" :class="{ 'text-blue-500': subSearch }" @click="subSearch = true">
    					<i class="fas fa-search text-xl"></i>
	    				<span class="ml-2 font-bold"></span>
	    			</div>
    			</div>
    			<div title="Menu" class="hover:no-underline cursor-pointer">
					<div class="nav-link p-3 text-gray-400 hover:text-blue-500 rounded mx-3 text-center relative transition w-14" :class="{ 'text-blue-500': subSidebar }" @click="subSidebar = true">
						<i class="fas fa-bars text-xl"></i>
	    				<span class="ml-2 font-bold"></span>
    					<span class="triangle absolute right-0" x-show.transition="subSidebar" style="display: none; bottom: -20px; right: 16px; width: 0; height: 0; border-left: 15px solid transparent; border-right: 15px solid transparent; border-bottom: 15px solid #3f83f8;"></span>
	    			</div>
				</div>
				<div class="sidebar-menu w-full bg-blue-500 p-4 fixed left-0" style="top: 100px; display: none;" x-show.transition="subSidebar" @click.away="subSidebar = false">
					<a href="{{ route('shop-dashboard') }}" title="Dashboard" class="flex-auto hover:no-underline">
	    				<div class="nav-link p-3 text-white hover:bg-blue-600 rounded mx-3 mb-3">
	    					<i class="fas fa-chart-line text-xl w-10"></i>
		    				<span class="ml-2 font-bold">Dashboard</span>
		    			</div>
	    			</a>
					<a href="{{ route('dashboard-product-index') }}" title="Dashboard" class="flex-auto hover:no-underline">
	    				<div class="nav-link p-3 text-white hover:bg-blue-600 rounded mx-3 mb-3">
	    					<i class="fas fa-shopping-bag text-xl w-10"></i>
	    					<span class="ml-2 font-bold">Products</span>
		    			</div>
	    			</a>
					<a href="{{ route('dashboard-categories-index') }}" title="Dashboard" class="flex-auto hover:no-underline">
	    				<div class="nav-link p-3 text-white hover:bg-blue-600 rounded mx-3 mb-3">
	    					<i class="fas fa-shopping-bag text-xl w-10"></i>
	    					<span class="ml-2 font-bold">Categories</span>
		    			</div>
	    			</a>
					<a href="{{ route('dashboard-stocks-index') }}" title="Dashboard" class="flex-auto hover:no-underline">
	    				<div class="nav-link p-3 text-white hover:bg-blue-600 rounded mx-3 mb-3">
	    					<i class="fas fa-shopping-bag text-xl w-10"></i>
	    					<span class="ml-2 font-bold">Stocks</span>
		    			</div>
	    			</a>
	    			<a href="{{ route('dashboard-branches-index') }}" title="Branches" class="flex-auto hover:no-underline">
	    				<div class="nav-link p-3 text-white hover:bg-blue-600 rounded mx-3 mb-3">
	    					<i class="fas fa-store text-xl w-10"></i>
		    				<span class="ml-2 font-bold">Branches</span>
		    			</div>
	    			</a>
	    			<a href="{{ route('dashboard-employees-index') }}" title="Employees" class="flex-auto hover:no-underline">
	    				<div class="nav-link p-3 text-white hover:bg-blue-600 rounded mx-3 mb-3">
	    					<i class="fas fa-user text-xl w-10"></i>
		    				<span class="ml-2 font-bold">Employees</span>
		    			</div>
	    			</a>
	    			<a href="{{ route('dashboard-employees-index') }}" title="Employees" class="flex-auto hover:no-underline">
	    				<div class="nav-link p-3 text-white hover:bg-blue-600 rounded mx-3 mb-3">
	    					<i class="fas fa-user text-xl w-10"></i>
		    				<span class="ml-2 font-bold">Settings</span>
		    			</div>
	    			</a>
				</div>
    		</div>
    		<div class="search-nav">
    			<div class="sub-nav fixed bg-white z-10 top-0 left-0 w-full cursor-auto h-screen" x-show.transition="subSearch" @click.away="subSearch = false" style="display: none; ">
	    			@livewire('dashboard.search')
    			</div>
	    	</div>
    	</div>
    	<div class="account-pane flex-1 hidden md:block">
    		@livewire('dashboard.account')
    	</div>
    </div>
</div>
