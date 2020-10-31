@extends('dashboard.dashboard')

@section('content')
<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Stocks
		</div>
		<div class="header-subtitle">
			Are your Messy products still in stock?
		</div>
		<div class="header-action">
			<a href="#settings" class="btn header-btn">
				Go to settings
			</a>
		</div>
		<div class="header-image">
		</div>
	</div>
</div>
<div class="db-content">
	<div class="container">
	<div class="">
			<input type="text" class="form-input w-100" wire:model="query" placeholder="Search"/>
		</div>

        {{ $branchId }}

		<table class="table-auto sortable w-100">
		  <thead class="sticky top-0">
		    <tr class="border-b border-gray-100">
		      <th class="p-4 text-blue-500 uppercase">Product</th>
		      <th class="p-4 text-blue-500 uppercase">Category</th>
		      <th class="p-4 text-blue-500 uppercase">Branch</th>
			  <th class="p-4 text-blue-500 uppercase">Stock of Branch</th>
			  <th class="p-4 text-blue-500 uppercase">Minimum Stock</th>
			  <th class="p-4 text-blue-500 uppercase">Action</th>
		    </tr>
		  </thead>
		  <tbody>

          
		  </tbody>
		</table>
	</div>
</div>
@endsection