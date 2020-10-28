@extends('dashboard.main', ['page' => 'Branch Information', 'pageSlug' => 'branches'])

@section('content')
<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Branch</strong> Overview
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
                    </div>

                    <div class="row">
                        <div class="col">
                            <span class="col-title">
                                {{ $branch->branch_name }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                               {{ $branch->branch_street }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                               {{ $branch->branch_city }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                               {{ $branch->branch_state }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                {{ $branch->branch_post_code }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                {{ $branch->branch_country }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                {{ $branch->branch_contact_number }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                                {{ $branch->branch_operating_hours }}
                            </span>
                        </div>
                        <div class="col">
                            <span class="col-title">
                               {{ $branch->branch_other_info }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection