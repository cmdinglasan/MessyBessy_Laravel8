<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Messy Bessy') }}</title>

    <!-- Scripts -->

    <!-- Core plugin JavaScript-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" defer></script>

    <script src="{{ asset('js/dashboard.min.js')}}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/messy.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/dashboard.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard2.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <div class="sidebar-wrapper">
            <div class="dashboard-sidebar">
                <div class="sidebar-header">
                    <div class="header">
                        <a href="/home">
                            <div class="header-icon">
                                <img src="{{ asset('img/icon.png') }}"/>
                            </div>
                            <div class="header-title">
                                Easy<span>Bessy</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="sidebar-body">
                    <div class="sidebar-item-group">
                        <div class="sidebar-item">
                            <a class="nav-link item" href="{{ url('/dashboard/index') }}" id="link-dashboard">
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
                            <a class="nav-link item" href="{{ url('/dashboard/branches') }}" id="link-employees">
                                <i class="fas fa-store"></i>
                                <span>Branches</span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-item-group">
                        <div class="sidebar-item">
                            <a class="nav-link item" href="{{ url('/dashboard/employees') }}" id="link-employees">
                                <i class="fas fa-user"></i>
                                <span>Employees</span>
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
        <div class="main-content">
            <div class="dashboard-content">
                @yield('content')
            </div>
        </div>
    </div>
    </script>

</body>
</html>