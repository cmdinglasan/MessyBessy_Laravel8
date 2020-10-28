@extends('dashboard.main', ['page' => 'Edit Category', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')
<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Categories</strong> Overview
            </h3>
            <div class="overview-new">
                <button class="new-item" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i>
                    <span>New Category</span>
                </button>
            </div>
        </div>
        @include('alerts.success')
        <div class="overview-table">
            <div class="table">
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            Name
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Product Count
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Stock Count
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Defective Stock Count
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Product Average Price
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Actions
                        </span>
                    </div>
                </div>
                <form method="post" action="{{ route('categories.update', $category) }}" autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col">
                            <span class="col-title">
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('name', $category->name) }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'name'])
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                {{ count($category->products) }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                {{ round($category->products->sum('stock_qty')) }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                {{ round($category->products->avg('minimum_stock')) }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                {{ round($category->products->avg('price')) }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <button type="submit" class="btn btn-primary ">Save</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('categories.store') }}" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <div class="modal-action">
                            <a @click="hideModal" class="close-btn" data-dismiss="modal">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" id="name" required pattern="\S+.*" value="{{ old('name') }}">
                            <label for="name">Name</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success mt-4">Save</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection