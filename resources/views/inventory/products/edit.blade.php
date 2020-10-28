@extends('dashboard.main', ['page' => 'Edit Product', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Edit</strong> Product
            </h3>
            <div class="overview-new">
                <button onclick="window.location.href=document.referrer" class="new-item">
                    <i class="fas fa-chevron-left" style="margin-right: 10px;"></i>
                    <span>Back to List</span>
                </button>
            </div>
        </div>
        @include('alerts.success')
        <form method="post" action="{{ route('products.update', $product) }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="overview-table">
                <div class="table">
                    <div class="row row-header">
                        <div class="col">
                            <span class="col-title">
                                Product
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <center>Category</center>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <center>Description</center>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <center>Stock</center>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <center>Minimum Stocks</center>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <center>Price</center>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <center>Image</center>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                Actions
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <span class="col-title">
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('name', $product->name) }}" required autofocus>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
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
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="text" name="description" id="input-description" class="form-control form-control-alternative" placeholder="Description" value="{{ old('description', $product->description) }}" required>
                                @include('alerts.feedback', ['field' => 'description'])
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="number" name="stock_qty" id="input-stock" class="form-control form-control-alternative" placeholder="Stock" value="{{ old('stock_qty', $product->stock_qty) }}" required>
                                @include('alerts.feedback', ['field' => 'stock_qty'])
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="number" name="minimum_stock" id="input-stock_minimum" class="form-control form-control-alternative" placeholder="Minimum Stock" value="{{ old('minimum_stock', $product->minimum_stock) }}" required>
                                @include('alerts.feedback', ['field' => 'minimum_stock'])
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="number" step=".01" name="price" id="input-price" class="form-control form-control-alternative" placeholder="Price" value="{{ old('price', $product->price) }}" required>
                                @include('alerts.feedback', ['field' => 'price'])
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="file" name="image" id="input-image" class="form-control form-control-alternative" placeholder="Image" value="{{ old('image', $product->image) }}" hidden>
                                <label for="input-image" style="border: 2px dashed #DEDFDF; padding: 10px; border-radius: 10px; width: 100%; text-align: center; cursor: pointer;">
                                    <img src="{{ asset('sprites/upload.svg') }}" height=" 100"/><br/>
                                    <small>Upload Image</small>
                                </label>
                                @include('alerts.feedback', ['field' => 'image'])
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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