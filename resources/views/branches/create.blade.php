@extends('layouts.app')

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
                                <h3 class="mb-0">New Branch</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('branches.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('branches.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">Branch Information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('branch_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch_name">Branch Name</label>
                                    <input type="text" name="branch_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('branch_name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('branch_name') }}" required autofocus>
                                    
                                </div>

                                <div class="form-group{{ $errors->has('branch_street') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch_street">Street</label>
                                    <input type="text" name="branch_street" id="input-branch_street" class="form-control form-control-alternative" placeholder="Street" value="{{ old('branch_street') }}" required>
                                    
                                </div>
                                <div class="form-group{{ $errors->has('branch_city') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch_city">City</label>
                                    <input type="text" name="branch_city" id="input-branch_city" class="form-control form-control-alternative" placeholder="City" value="{{ old('branch_city') }}" required>
                                    
                                </div>
                                <div class="form-group{{ $errors->has('branch_state') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch_state">State</label>
                                    <input type="text" name="branch_state" id="input-branch_state" class="form-control form-control-alternative" placeholder="State" value="{{ old('branch_state') }}" required>
                                    
                                </div>
                                <div class="form-group{{ $errors->has('branch_post_code') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch_post_code">Post Code</label>
                                    <input type="text" name="branch_post_code" id="input-branch_post_code" class="form-control form-control-alternative" placeholder="Post Code" value="{{ old('branch_post_code') }}" required>
                                    
                                </div>
                                <div class="form-group{{ $errors->has('branch_country') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch_country">Country</label>
                                    <input type="text" name="branch_country" id="input-branch_country" class="form-control form-control-alternative" placeholder="Country" value="{{ old('branch_country') }}" required>
                                    
                                </div>
                                <div class="form-group{{ $errors->has('branch_contact_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch_contact_number">Contact Number</label>
                                    <input type="text" name="branch_contact_number" id="input-branch_contact_number" class="form-control form-control-alternative" placeholder="Contact_Number" value="{{ old('branch_contact_number') }}" required>
                                    
                                </div>
                                <div class="form-group{{ $errors->has('branch_operating_hours') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch_operating_hours">Operating Hours</label>
                                    <input type="text" name="branch_operating_hours" id="input-branch_operating_hours" class="form-control form-control-alternative" placeholder="Operating_Hours" value="{{ old('branch_operating_hours') }}" required>
                                    
                                </div>
                                
                                <div class="form-group{{ $errors->has('branch_other_info') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch_other_info">Additional Information</label>
                                    <input type="text" name="branch_other_info" id="input-branch_other_info" class="form-control form-control-alternative" placeholder="Other_Info" value="{{ old('branch_other_info') }}" >
                                    
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