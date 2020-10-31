<div wire:ignore.self class="modal fade" id="createBranch" tabindex="-1" role="dialog" aria-labelledby="createBranch" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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