<div class="sidebar-wrapper">
    <div class="dashboard-sidebar">
        <div class="sidebar-header">
            <div class="header">
                <a href="{{ route('home') }}">
                    <div class="header-icon h-10 inline-block align-middle mr-3">
                        <img src="{{ asset('img/icon.png') }}" class="h-parent"/>
                    </div>
                    <div class="header-title md:inline-block font-bold align-middle h-10 leading-10  text-xl">
                        Easy<span>Bessy</span>
                    </div>
                </a>
                <button class="btn nav-icon absolute top-5 right-5">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <div class="sidebar-body">
            <div class="sidebar-group">
                <div class="sidebar-group-title mb-2">
                    <h4>Admin</h4>
                </div>

                <div class="sidebar-item">
                    <a class="nav-link item active" href="{{ url('/dashboard/') }}" id="link-dashboard">
                        <i class="far fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
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
                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ url('/dashboard/branches') }}" id="link-employees">
                        <i class="fas fa-store"></i>
                        <span>Branches</span>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ url('/dashboard/employees') }}" id="link-employees">
                        <i class="fas fa-user"></i>
                        <span>Employees</span>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ url('/dashboard/settings') }}" id="link-settings">
                        <i class="fas fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                </div>
            </div>

            <div class="sidebar-group">
                <div class="sidebar-group-title mb-2">
                    <h4>Insights</h4>
                </div>

                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ url('/dashboard/') }}" id="link-dashboard">
                        <i class="fas fa-envelope"></i>
                        <span>Messages</span>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ url('/dashboard/') }}" id="link-dashboard">
                        <i class="fas fa-bell"></i>
                        <span>Alerts</span>
                    </a>
                </div>
            </div>   

            <div class="sidebar-group">
                <div class="sidebar-group-title mb-2">
                    <h4>Account</h4>
                </div>

                <div class="sidebar-item">
                    <a class="nav-link item" href="{{ route('logout') }}" id="link-logout">
                        <i class="fas fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>   
        </div>
    </div>     
</div>

