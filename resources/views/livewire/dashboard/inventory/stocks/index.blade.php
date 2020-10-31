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

		<table class="table-auto sortable w-100">
		  <thead class="sticky top-0">
		    <tr class="border-b border-gray-100">
		      <th class="p-4 text-blue-500 uppercase">Branch</th>
		      <th class="p-4 text-blue-500 uppercase">Location</th>
		      <th class="p-4 text-blue-500 uppercase">Region</th>
			  <th class="p-4 text-blue-500 uppercase">Sold</th>
			  <th class="p-4 text-blue-500 uppercase">Unsold</th>
			  <th class="p-4 text-blue-500 uppercase">Action</th>
		    </tr>
		  </thead>
		  <tbody>

		  @if(!empty($query))
		  	@if(!empty($results))
			  	@foreach($results as $result)
				    <tr class="border-b border-gray-100 hover:bg-gray-100">
				      <td class="border p-4 border-0">{{ $result['branch_name'] }}</td>
				      <td class="border p-4 border-0">{{ $result['branch_city'] }}</td>
				      <td class="border p-4 border-0">{{ $result['state'] }}</td>
				    </tr>
			    @endforeach
			@else
				<tr>
					<div class="result error">
						<span class="error-text">No results found. Try searching again.</span>
					</div>
				</tr>
			@endif
		@else
		  	@foreach($branches as $branch)
			    <tr class="border-b border-gray-100 hover:bg-gray-100">
			      <td class="border p-4 border-0">{{ $branch['branch_name'] }}</td>
				  <td class="border p-4 border-0">{{ $branch['branch_city'] }}</td>
			      <td class="border p-4 border-0">{{ $branch['branch_state'] }}</td>
				  <td class="border p-4 border-0">0</td>
				  <td class="border p-4 border-0">0</td>
				  <td><a href="{{ route('dashboard-stocks-show', 'id='.$branch['id']) }}">View Stock Level</td>
			    </tr>
		    @endforeach
		@endif
		  </tbody>
		</table>
	</div>
</div>
@endsection