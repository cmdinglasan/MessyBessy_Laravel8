@extends('dashboard.main', ['page' => 'List of Products', 'pageSlug' => 'stocks', 'section' => 'inventory'])

@section('content')

<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Edit</strong> Stock
            </h3>
            <div class="overview-new">
                <button onclick="window.location.href=document.referrer" class="new-item">
                    <i class="fas fa-chevron-left" style="margin-right: 10px;"></i>
                    <span>Back to List</span>
                </button>
            </div>
        </div>
        @include('alerts.success')
        <form method="post" action="{{ route('stocks.update', $stock) }}" autocomplete="off" enctype="multipart/form-data">
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
                                Stock Count
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                Minimum Stocks
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span class="col-title">
                                <select name="product_id" id="input-product" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('product_id', $stock->product_id) }}" disabled>
                                    @foreach ($products as $product)
                                        @if($product['id'] == old('product_id'))
                                            <option value="{{$product['id']}}" >{{$product['name']}}</option>
                                        @else
                                            <option value="{{$product['id']}}" selected hidden>{{$product['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                {{ $stock->product->category->name }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <select name="branch_id" id="input-branch" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }} " value="{{ old('branch_id', $stock->branch_id) }}" disabled>
                                    @foreach ($branches as $branch)
                                        @if($branch['id'] == old('branch_id'))
                                            <option value="{{$branch['id']}}" >{{$branch['branch_name']}}</option>
                                        @else
                                            <option value="{{$branch['id']}}" selected hidden>{{$branch['branch_name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="number" name="branch_stock" id="input-stock" class="form-control form-control-alternative" placeholder="Stock" value="{{ old('stock', $stock->branch_stock) }}" required>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="number" name="branch_minimum_stock" id="input-stock_defective" class="form-control form-control-alternative" placeholder="Defective Stock" value="{{ old('stock_defective', $stock->branch_minimum_stock) }}" required>
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