@extends('dashboard.main', ['page' => 'List of Products', 'pageSlug' => 'stocks', 'section' => 'inventory'])

@section('content')

<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Stocks</strong> Overview
            </h3>
            <div class="overview-new">
                <button onclick="window.location.href='{{ route('stocks.index') }}'" class="new-item">
                    <i class="fas fa-chevron-left" style="margin-right: 10px;"></i>
                    <span>Back to List</span>
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
                            Category
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Branch
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Stock of Branch
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Minimum Stock
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Action
                        </span>
                    </div>
                </div>
                @foreach ($stockser as $stock)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            <strong>{{ $stock->product->name }}</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $stock->product->category->name }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $stock->branch->branch_name }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $stock->branch_stock }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $stock->branch_minimum_stock }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                <i class="far fa-edit"></i>
                            </a>        
                        </span>
                        <span class="col-title">
                            <form action="{{ route('stocks.destroy', $stock) }}" method="post" class="d-inline">
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

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('products.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Stock</h5>
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

<!-- div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Stocks</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">Product</th>
                            <th scope="col">Category</th>
                            <th scope="col">Branch</th>
                            <th scope="col">Stock of Branch</th>
                            <th scope="col">Minimum Stock of Product</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach ($stockser as $stock)
                            <tr>
                                <td>{{ $stock->product->name }}</td>
                                <td>{{ $stock->product->category->name }}</td>
                                <td>{{ $stock->branch->branch_name }}</td>
                                <td>{{ $stock->branch_stock }}</td>
                                <td>{{ $stock->branch_minimum_stock }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form action="{{ route('stocks.destroy', $stock) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end">
                    {{ $stockser->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
</div -->