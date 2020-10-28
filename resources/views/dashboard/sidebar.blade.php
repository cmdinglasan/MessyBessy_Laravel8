<div class="sidebar-wrapper">
    <div class="dashboard-sidebar">
        <div class="sidebar-header">
            <div class="header">
                <a href="/home">
                    <div class="header-icon">
                        <img src="img/icon.png"/>
                    </div>
                    <div class="header-title">
                        <span>EasyBessy</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="sidebar-body">
            <div class="sidebar-item-group">
                <div class="sidebar-item">
                    <a class="nav-link item active" href="{{ url('/dashboard') }}" id="link-dashboard">
                        <i class="far fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
            </div>
            <div class="sidebar-item-group">
                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ url('/dashboard/products') }}" id="link-products">
                        <i class="far fa-shopping-bag"></i>
                        <span>Products</span>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ url('/dashboard/categories') }}" id="link-categories">
                        <i class="far fa-table"></i>
                        <span>Categories</span>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ url('/dashboard/stocks') }}" id="link-stocks">
                        <i class="far fa-table"></i>
                        <span>Stocks</span>
                    </a>
                </div>
            </div>
            <div class="sidebar-item-group">
                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ url('/dashboard/settings') }}" id="link-settings">
                        <i class="fas fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </div>      
</div>

