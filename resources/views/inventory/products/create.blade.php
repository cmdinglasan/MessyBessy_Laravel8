@extends('layouts.app', ['page' => 'New Product', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/dashboard')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <img style="width: 90%;" src="{{ asset('img/icon.png') }}" />
            </div>
            <div class="sidebar-brand-text mx-3">EasyBessy Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>


        <div class="nav-items">
            <!-- Nav Item - Product Menu -->
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/products')}}">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Products</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/categories')}}">
                    <i class="fas fa-table"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/stocks')}}">
                    <i class="fas fa-table"></i>
                    <span>Stocks</span>
                </a>
            </li>
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/branches')}}">
                    <i class="fas fa-table"></i>
                    <span>Branches</span>
                </a>
            </li>
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/employee')}}">
                    <i class="fas fa-table"></i>
                    <span>Employees</span>
                </a>
            </li>
        </div>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">New Product</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">Product Information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Name</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>

                                <div class="form-group{{ $errors->has('product_category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Category</label>
                                    <select name="product_category_id" id="input-category" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($categories as $category)
                                            @if($category['id'] == old('document'))
                                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                            @else
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'product_category_id'])
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">Description</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative" placeholder="Description" value="{{ old('description') }}" required>
                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>
                                <div class="row">
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">Stock</label>
                                            <input type="number" name="stock_qty" id="input-stock" class="form-control form-control-alternative" placeholder="Stock" value="{{ old('stock_qty') }}" required>
                                            @include('alerts.feedback', ['field' => 'stock_qty'])
                                        </div>
                                    </div>                            
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('stock_minimum') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock_minimum">Minimum Stock</label>
                                            <input type="number" name="minimum_stock" id="input-stock_minimum" class="form-control form-control-alternative" placeholder="Minimum Stock" value="{{ old('minimum_stock') }}" required>
                                            @include('alerts.feedback', ['field' => 'minimum_stock'])
                                        </div>
                                    </div>
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">Price</label>
                                            <input type="number" step=".01" name="price" id="input-price" class="form-control form-control-alternative" placeholder="Price" value="{{ old('price') }}" required>
                                            @include('alerts.feedback', ['field' => 'price'])
                                        </div>
                                    </div>                            
                                </div>
                                <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-image">Upload Image</label>
                                            <input type="file" name="image" id="input-image" class="form-control form-control-alternative" placeholder="Image" value="{{ old('image') }}" required>
                                            @include('alerts.feedback', ['field' => 'image'])
                                        </div>
                                    </div>  

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
@endpush