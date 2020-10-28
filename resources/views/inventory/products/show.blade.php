@extends('dashboard.main', ['page' => 'Product Information', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Products</strong> Overview
            </h3>
            <div class="overview-new">
                <button onclick="window.location.href=document.referrer" class="new-item">
                    <i class="fas fa-chevron-left" style="margin-right: 10px;"></i>
                    <span>Back to List</span>
                </button>
            </div>
        </div>
        <div class="overview-table">
            <div class="table">
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            ID
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Product
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Category
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Warehouse Stocks
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Minimum Stocks
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Price
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Average Price
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Total Sales
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Income Produced
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            <strong>{{ $product->id }}</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $product->name }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $product->category->name }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <center>{{ $product->stock_qty }}</center>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <center>{{ $product->minimum_stock }}</center>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <center>{{ $product->price }}</center>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <center>{{ $product->solds->avg('product_price') }}</center>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <center>{{ $product->solds->sum('qty') }}</center>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <center>{{ $product->solds->sum('total_amount') }}</center>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('products.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
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
                        <div class="form-group">
                            <input type="text" name="description" id="description" required pattern="\S+.*" value="{{ old('description') }}">
                            <label for="description">Description</label>
                        </div>
                        <div class="form-group">
                            <select name="product_category_id" id="category" required pattern="\S+.*" value="{{ old('product_category_id') }}">
                                <option value="1">Man's Care</option>
                                <option value="2">Home and House Care</option>
                            </select>
                            <label for="category">Category</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="price" id="price" required pattern="\S+.*" value="{{ old('price') }}">
                            <label for="price">Price</label>
                        </div>
                        <div class="form-group">
                            <input type="number" name="stock_qty" id="stock_count" required pattern="\S+.*" value="{{ old('stock_qty') }}">
                            <label for="stock_count">Stock Count</label>
                        </div>
                        <div class="form-group">
                            <input type="number" name="minimum_stock" id="min_stock" required pattern="\S+.*" value="{{ old('stock_qty') }}">
                            <label for="min_stock">Minimum Stock</label>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="input-image" placeholder="Image" value="{{ old('image') }}" required>
                            <label for="image">Image</label>
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
