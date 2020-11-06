<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Branches
		</div>
		<div class="header-subtitle">
			Find out where the Messy branches are.
		</div>
		<div class="header-action">
			<a wire:click="showAddForm()" class="btn header-btn">
				Add Branch
			</a>
		</div>
		<div class="header-image">
		</div>

		@if($addForm == 1)
		<div class="header-modal">
			<div class="background" wire:click="hideAddForm()"></div>
			<div class="container relative z-10 bg-white p-10 rounded shadow-2xl max-w-md">
				<div class="header-modal-title mb-3">
					<h2 class="text-gray-700 text-2xl font-bold">Add Branch</h2>
				</div>
				<form wire:submit.prevent="store">
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">Branch Name</label>
						<input type="text" wire:model="branch_name" class="form-control @error('branch_name') is-invalid @enderror" placeholder="Branch Name">
			            @error('branch_name')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">Street</label>
						<input type="text" wire:model="branch_street" class="form-control @error('branch_street') is-invalid @enderror" placeholder="Street">
			            @error('branch_street')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">City</label>
						<input type="text" wire:model="branch_city" class="form-control @error('branch_city') is-invalid @enderror" placeholder="City">
			            @error('branch_city')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">Region</label>
						<input type="text" wire:model="branch_state" class="form-control @error('branch_state') is-invalid @enderror" placeholder="Region">
			            @error('branch_state')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">Postal Code</label>
						<input type="text" wire:model="branch_post_code" class="form-control @error('branch_post_code') is-invalid @enderror" placeholder="Postal Code">
			            @error('branch_post_code')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="country" class="uppercase font-bold text-xs text-gray-400">Country</label>
						<select wire:model="branch_country" class="form-control @error('branch_country') is-invalid @enderror">
						@foreach($countries as $country)
							<option value="{{ $country->code }}">{{ $country->name }}</option>
						@endforeach
						</select>
			            @error('branch_country')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">Contact Number</label>
						<input type="text" wire:model="branch_contact_number" class="form-control @error('branch_contact_number') is-invalid @enderror" placeholder="Contact Number">
			            @error('branch_contact_number')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">Operating Hours</label>
						<input type="text" wire:model="branch_operating_hours" class="form-control @error('branch_operating_hours') is-invalid @enderror" placeholder="Operating Hours">
			            @error('branch_operating_hours')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
					<div class="form-group">
						<label for="name" class="uppercase font-bold text-xs text-gray-400">Other Information</label>
						<input type="text" wire:model="branch_other_info" class="form-control @error('branch_other_info') is-invalid @enderror" placeholder="Other Information">
			            @error('branch_other_info')
			                <span class="invalid-feedback">
			                        {{ $message }}
			                 </span>
			            @enderror
			        </div>
			        <div class="form-group">
		            	<button type="submit" class="btn btn-primary">Add</button>
		            </div>
	        	</form>
	        </div>
        </div>
        @else
        @endif
	</div>
</div>

<div class="db-content">
	<div class="container">

		<!-- Search -->
		<livewire:dashboard.branches.module.search wire.model="element"/>
		<!-- End of Search -->

	</div>
</div>