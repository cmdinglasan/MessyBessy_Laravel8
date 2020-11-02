<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Branches
		</div>
		<div class="header-subtitle">
			Where are those branches at?
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
	@if($updateMode)
		@include('dashboard.branches.update')
	@else
		@include('dashboard.branches.create')
	@endif
		<div class="">
			<input type="text" class="form-input w-100" wire:model="query" placeholder="Search"/>
		</div>

		

		<table class="table-auto sortable w-100">
		  <thead class="sticky top-0">
		    <tr class="border-b border-gray-100">
		      <th class="p-4 text-blue-500 uppercase">Branch Name</th>
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
				     <td>
		                <button wire:click="edit({{ $branch->id }})" class="btn btn-primary btn-sm">Edit</button>
		                <button wire:click="delete({{ $branch->id }})" class="btn btn-danger btn-sm">Delete</button>
	                </td>
			    </tr>

		    @endforeach
	
		  </tbody>
		</table>

		<!--- @if($updateMode)
		<div wire:ignore.self class="modal fade" id="updateBranch" tabindex="-1" role="dialog" tabindex="-1" role="dialog" aria-labelledby="updateBranch" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
				<form>
				    <div class="form-group">
				        <input type="hidden" wire:model="branch_name">
				        <label for="exampleFormControlInput1">Branch Name</label>
				        <input type="text" class="form-control" wire:model="branch_name" id="exampleFormControlInput1" placeholder="Enter Branch Name">
				        @error('branch_name') <span class="text-danger">{{ $message }}</span>@enderror
				    </div>
				    <div class="form-group">
				        <input type="hidden" wire:model="branch_street">
				        <label for="exampleFormControlInput1">Street</label>
				        <input type="text" class="form-control" wire:model="branch_street" id="exampleFormControlInput1" placeholder="Enter Street">
				        @error('branch_street') <span class="text-danger">{{ $message }}</span>@enderror
				    </div>
				    <div class="form-group">
				        <input type="hidden" wire:model="branch_city">
				        <label for="exampleFormControlInput1">City</label>
				        <input type="text" class="form-control" wire:model="branch_city" id="exampleFormControlInput1" placeholder="Enter Street">
				        @error('branch_city') <span class="text-danger">{{ $message }}</span>@enderror
				    </div>
				    <div class="form-group">
				        <input type="hidden" wire:model="branch_state">
				        <label for="exampleFormControlInput1">Region</label>
				        <input type="text" class="form-control" wire:model="branch_state" id="exampleFormControlInput1" placeholder="Region">
				        @error('branch_state') <span class="text-danger">{{ $message }}</span>@enderror
				    </div>
				    <div class="form-group">
				        <input type="hidden" wire:model="branch_post_code">
				        <label for="exampleFormControlInput1">Post Code</label>
				        <input type="text" class="form-control" wire:model="branch_post_code" id="exampleFormControlInput1" placeholder="State">
				        @error('branch_post_code') <span class="text-danger">{{ $message }}</span>@enderror
				    </div>
				    <div class="form-group">
				        <input type="hidden" wire:model="branch_country">
				        <label for="exampleFormControlInput1">Country</label>
				        <input type="text" class="form-control" wire:model="branch_country" id="exampleFormControlInput1" placeholder="Country">
				        @error('branch_country') <span class="text-danger">{{ $message }}</span>@enderror
				    </div>
				    <div class="form-group">
				        <input type="hidden" wire:model="branch_contact_number">
				        <label for="exampleFormControlInput1">Contact Number</label>
				        <input type="text" class="form-control" wire:model="branch_contact_number" id="exampleFormControlInput1" placeholder="Contact Number">
				        @error('branch_contact_number') <span class="text-danger">{{ $message }}</span>@enderror
				    </div>
				    <div class="form-group">
				        <input type="hidden" wire:model="branch_operating_hours">
				        <label for="exampleFormControlInput1">Operating Hours</label>
				        <input type="text" class="form-control" wire:model="branch_operating_hours" id="exampleFormControlInput1" placeholder="Operating Hours">
				        @error('branch_operating_hours') <span class="text-danger">{{ $message }}</span>@enderror
				    </div>
				    <div class="form-group">
				        <input type="hidden" wire:model="branch_other_info">
				        <label for="exampleFormControlInput1">Other Info</label>
				        <input type="text" class="form-control" wire:model="branch_other_info" id="exampleFormControlInput1" placeholder="Other Info">
				        @error('branch_other_info') <span class="text-danger">{{ $message }}</span>@enderror
				    </div>


				    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
				    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
				</form>
            </div>
          </div>
		</div>
		@else
			<div wire:ignore.self class="modal fade" id="addBranch" tabindex="-1" role="dialog" aria-labelledby="addBranch" aria-hidden="true">
			    <div class="modal-dialog modal-dialog-centered" role="document">
			    	<div class="modal-content">
					<form>
			            <div class="form-group">
			                <label for="exampleFormControlInput1">Branch Name</label>
			                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Branch Name" wire:model="branch_name">
			                @error('branch_name') <span class="text-danger">{{ $message }}</span>@enderror
			            </div>
			            <div class="form-group">
			                <label for="exampleFormControlInput1">Street</label>
			                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Street" wire:model="branch_street">
			                @error('branch_street') <span class="text-danger">{{ $message }}</span>@enderror
			            </div>
			            <div class="form-group">
			                <label for="exampleFormControlInput1">City</label>
			                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter City" wire:model="branch_city">
			                @error('branch_city') <span class="text-danger">{{ $message }}</span>@enderror
			            </div>
			            <div class="form-group">
			                <label for="exampleFormControlInput1">Region</label>
			                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Region" wire:model="branch_state">
			                @error('branch_state') <span class="text-danger">{{ $message }}</span>@enderror
			            </div>
			            <div class="form-group">
			                <label for="exampleFormControlInput1">Post Code</label>
			                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Post Code" wire:model="branch_post_code">
			                @error('branch_post_code') <span class="text-danger">{{ $message }}</span>@enderror
			            </div>
			            <div class="form-group">
			                <label for="exampleFormControlInput1">Country</label>
			                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Country" wire:model="branch_country">
			                @error('branch_country') <span class="text-danger">{{ $message }}</span>@enderror
			            </div>
			            <div class="form-group">
			                <label for="exampleFormControlInput1">Contact Number</label>
			                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Contact Number" wire:model="branch_contact_number">
			                @error('branch_contact_number') <span class="text-danger">{{ $message }}</span>@enderror
			            </div>
			            <div class="form-group">
			                <label for="exampleFormControlInput1">Operating Hours</label>
			                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Operating Hours" wire:model="branch_operating_hours">
			                @error('branch_operating_hours') <span class="text-danger">{{ $message }}</span>@enderror
			            </div>
			            <div class="form-group">
			                <label for="exampleFormControlInput1">Other Info</label>
			                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Other Info" wire:model="branch_other_info">
			                @error('branch_other_info') <span class="text-danger">{{ $message }}</span>@enderror
			            </div>
			            <button wire:click.prevent="store()" class="btn btn-success">Save</button>
			        </form>
				    </div>
			    </div>
			</div>
		@endif -->
	</div>
</div>