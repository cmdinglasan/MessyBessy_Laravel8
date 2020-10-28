@extends('dashboard.main')

@section('content')
<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Edit</strong> Branch
            </h3>
            <div class="overview-new">
                <button onclick="window.location.href=document.referrer" class="new-item">
                    <i class="fas fa-chevron-left" style="margin-right: 10px;"></i>
                    <span>Back to List</span>
                </button>
            </div>
        </div>
        @include('alerts.success')
        <form method="post" action="{{ route('branches.update', $branch) }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="overview-table">
                <div class="table">
                    <div class="row row-header">
                        <div class="col">
                            <span class="col-title">
                                Name
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                Street
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                City
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                State
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                Post Code
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                Country
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                Contact Number
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                Operating Hours
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                Additional Information
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                Actions
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <span class="col-title">
                                <input type="text" name="branch_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('branch_name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('branch_name', $branch->branch_name) }}" required autofocus>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                               <input type="text" name="branch_street" id="input-branch_street" class="form-control form-control-alternative" placeholder="Street" value="{{ old('branch_street', $branch->branch_street) }}" required>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                               <input type="text" name="branch_city" id="input-branch_city" class="form-control form-control-alternative" placeholder="City" value="{{ old('branch_city', $branch->branch_city) }}" required>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                               <input type="text" name="branch_state" id="input-branch_state" class="form-control form-control-alternative" placeholder="State" value="{{ old('branch_state', $branch->branch_state) }}" required>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="text" name="branch_post_code" id="input-branch_post_code" class="form-control form-control-alternative" placeholder="Post Code" value="{{ old('branch_post_code', $branch->branch_post_code) }}" required>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="text" name="branch_country" id="input-branch_country" class="form-control form-control-alternative" placeholder="Country" value="{{ old('branch_country', $branch->branch_country) }}" required>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="text" name="branch_contact_number" id="input-branch_contact_number" class="form-control form-control-alternative" placeholder="Contact_Number" value="{{ old('branch_contact_number', $branch->branch_contact_number) }}" required>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                <input type="text" name="branch_operating_hours" id="input-branch_operating_hours" class="form-control form-control-alternative" placeholder="Operating_Hours" value="{{ old('branch_operating_hours', $branch->branch_operating_hours) }}" required>
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                               <input type="text" name="branch_other_info" id="input-branch_other_info" class="form-control form-control-alternative" placeholder="Other_Info" value="{{ old('branch_other_info', $branch->branch_other_info) }}" >
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