@extends('layouts.app', ['page' => 'Add Stock', 'pageSlug' => 'stocks', 'section' => 'inventory'])

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
                                <h3 class="mb-0">Add Stocks</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('stocks.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('stocks.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">Stock Information</h6>
                            <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Product</label>
                                    <select name="product_id" id="input-product" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($products as $product)
                                            @if($product['id'] == old('document'))
                                                <option value="{{$product['id']}}" selected>{{$product['name']}}</option>
                                            @else
                                                <option value="{{$product['id']}}">{{$product['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                </div>

                                <div class="form-group{{ $errors->has('branch_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Branch</label>
                                    <select name="branch_id" id="input-branch" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($branches as $branch)
                                            @if($branch['id'] == old('document'))
                                                <option value="{{$branch['id']}}" selected>{{$branch['branch_name']}}</option>
                                            @else
                                                <option value="{{$branch['id']}}" >{{$branch['branch_name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">Stock</label>
                                            <input type="number" name="branch_stock" id="input-stock" class="form-control form-control-alternative" placeholder="Stock" value="{{ old('stock') }}" required>
                                            
                                        </div>
                                    </div>                            
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock_defective">Minimum Stocks</label>
                                            <input type="number" name="branch_minimum_stock" id="input-stock_defective" class="form-control form-control-alternative" placeholder="Defective Stock" value="{{ old('stock_defective') }}" required>
                                            
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