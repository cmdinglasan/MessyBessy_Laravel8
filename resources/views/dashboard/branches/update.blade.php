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