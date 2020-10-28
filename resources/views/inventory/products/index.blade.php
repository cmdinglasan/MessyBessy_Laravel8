@extends('dashboard.main', ['page' => 'List of Products', 'pageSlug' => 'products', 'section' => 'inventory'])
@section('content')

<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Products</strong> Overview
            </h3>
            <div class="overview-new">
                <button class="new-item" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i>
                    <span>New product</span>
                </button>
            </div>
        </div>
        @include('alerts.success')
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
                            <center>Price</center>
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
                            <center>Total Sold</center>
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
                @foreach($products as $product)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            <strong>{{ $product->name }}</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <center>{{$product->category->name}}</center>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <center>{{ $product->price }}</center>
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
                            <center>{{ $product->total_sold }}</center>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <center><img src="{{ url('img/products/') }}/{{ $product->image }}"/></center>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                <i class="far fa-eye"></i>
                            </a>
                        </span>
                        <span class="col-title">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                <i class="far fa-edit"></i>
                            </a>
                        </span>
                        <span class="col-title">
                            <form action="{{ route('products.destroy', $product) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </span>
                    </div>
                </div>
                @endforeach
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
                                @foreach ($categories as $category)
                                            @if($category['id'] == old('document'))
                                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                            @else
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endif
                                @endforeach
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