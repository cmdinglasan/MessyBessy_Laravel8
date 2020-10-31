<div>
    @if($updateMode)
    	@include('livewire.dashboard.branches.update')
    @else
    	@include('livewire.dashboard.branches.create')
    @endif
    
    <div class="db-content">
	<div class="container">
		<div class="">
			<input type="text" class="form-input w-100" wire:model="query" placeholder="Search"/>
		</div>

		<table class="table-auto sortable w-100">
		  <thead class="sticky top-0">
		    <tr class="border-b border-gray-100">
		      <th class="p-4 text-blue-500 uppercase"> Branch Name</th>
		      <th class="p-4 text-blue-500 uppercase">Street</th>
		      <th class="p-4 text-blue-500 uppercase">City</th>
		      <th class="p-4 text-blue-500 uppercase">Region</th>
		      <th class="p-4 text-blue-500 uppercase">Post Code</th>3
		      <th class="p-4 text-blue-500 uppercase">Country</th>
		      <th class="p-4 text-blue-500 uppercase">Contact Number</th>
		      <th class="p-4 text-blue-500 uppercase">Operating Hours</th>
		      <th class="p-4 text-blue-500 uppercase">Other Info</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($branches as $branch)
			    <tr class="border-b border-gray-100 hover:bg-gray-100">
			      <td class="border px-4 border-0 w-20">
			      	{{ $branch->branch_name }}
			      </td>
			      <td class="border px-4 border-0 w-20">
			      	{{ $branch->branch_street }}
			      </td>
			      <td class="border px-4 border-0 w-20">
			      	{{ $branch->branch_city }}
			      </td>
			      <td class="border px-4 border-0 w-20">
			      	{{ $branch->branch_state }}
			      </td>
			      <td class="border px-4 border-0 w-20">
			      	{{ $branch->branch_post_code }}
			      </td>
			      <td class="border px-4 border-0 w-20">
			      	{{ $branch->branch_country }}
			      </td>
			      <td class="border px-4 border-0 w-20">
			      	{{ $branch->branch_contact_number }}
			      </td>
			      <td class="border px-4 border-0 w-20">
			      	{{ $branch->branch_operating_hours }}
			      </td>
			      <td class="border px-4 border-0 w-20">
			      	{{ $branch->branch_other_info }}
			      </td>
			    </tr>

		    @endforeach
	
		  </tbody>
		</table>
	</div>
</div>



</div>
