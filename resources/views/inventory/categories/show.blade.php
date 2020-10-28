@extends('dashboard.main', ['page' => 'Category Information', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')
<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Category</strong> Overview
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
                            Total Warehouse Stock
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Average Minimum Product
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Average Price
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            {{ $category->id }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $category->name }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $category->products->count() }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $category->products->sum('stock_qty') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $category->products->avg('minimum_stock') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Php {{ round($category->products->avg('price'), 2) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Products</strong> Overview
            </h3>
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
                            Name
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Warehouse Stock
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Minimum Allowable Stock
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Base Price
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
                @foreach ($products as $product)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            <a href="{{ route('products.show', $product) }}">{{ $product->id }}</a>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $product->stock_qty }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $product->minimum_stock }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $product->price }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $product->solds->sum('qty') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $product->solds->sum('total_amount') }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection