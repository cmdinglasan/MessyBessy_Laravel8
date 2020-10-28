@extends('dashboard.main', ['page' => 'List of Products', 'pageSlug' => 'stocks', 'section' => 'inventory'])

@section('content')

<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Stocks</strong> Overview
            </h3>
            <div class="overview-new">
                <button class="new-item" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i>
                    <span>Add stock</span>
                </button>
            </div>
        </div>
        @include('alerts.success')
        <div class="overview-table">
            <div class="table">
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            Branch
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Location
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Region
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Sold
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Unsold
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Action
                        </span>
                    </div>
                </div>
                @foreach($branches as $branch)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            <strong>{{ $branch->branch_name }}</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <strong>{{ $branch->branch_city }}</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <strong>{{ $branch->branch_state }}</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <strong>10</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <strong>70</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <a href="{{ route('stocks.show', $branch->id ) }}">View Stock Level</a>
                        </span>
                    </div>
                </div>
                @endforeach
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Unsold = 69
                        </span><br/>
                        <span class="col-title">
                            Sold = 19
                        </span><br/>
                        <span class="col-title">
                            Total = 79
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('stocks.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Stock</h5>
                        <div class="modal-action">
                            <a @click="hideModal" class="close-btn" data-dismiss="modal">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="product_id" id="input-product" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                @foreach ($products as $product)
                                    @if($product['id'] == old('document'))
                                        <option value="{{$product['id']}}" selected>{{$product['name']}}</option>
                                    @else
                                        <option value="{{$product['id']}}">{{$product['name']}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-group">
                            <select name="branch_id" id="input-branch" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                            @foreach ($branches as $branch)
                                @if($branch['id'] == old('document'))
                                    <option value="{{$branch['id']}}" selected>{{$branch['branch_name']}}</option>
                                @else
                                    <option value="{{$branch['id']}}" >{{$branch['branch_name']}}</option>
                                @endif
                            @endforeach
                            </select>
                            <label for="description">Branch</label>
                        </div>
                        <div class="form-group">
                            <select name="product_category_id" id="category" required pattern="\S+.*" value="{{ old('product_category_id') }}">
                                <option value="1">Man's Care</option>
                                <option value="2">Home and House Care</option>
                            </select>
                            <label for="category">Category</label>
                        </div>
                        <div class="form-group">
                            <input type="number" name="stock_qty" id="stock_count" required pattern="\S+.*" value="{{ old('stock_qty') }}">
                            <label for="stock_count">Stock Count</label>
                        </div>
                        <div class="form-group">
                            <input type="number" name="minimum_stock" id="min_stock" required pattern="\S+.*" value="{{ old('stock_defective') }}">
                            <label for="min_stock">Minimum Stock</label>
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

<!-- div id="wrapper">

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Stocks</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('stocks.create') }}" class="btn btn-sm btn-primary">Add stock</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">Branch</th>
                            <th scope="col">Stocks of Branch</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                            <tr>
                                <td>{{ $branch->branch_name }}</td>
                                <td><a href="{{ route('stocks.show', $branch->id ) }}">View Stock Level</a></td>
                                <td class="td-actions text-right">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end">
                    {{ $branches->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
</div -->