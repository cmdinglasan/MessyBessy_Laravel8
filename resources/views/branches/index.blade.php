@extends('dashboard.main', ['page' => 'List of Categories', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')

<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Branch</strong> Overview
            </h3>
            <div class="overview-new">
                <button class="new-item" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i>
                    <span>New Branch</span>
                </button>
            </div>
        </div>
        @include('alerts.success')
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
                            City
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Country
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Operating Hours
                        </span>
                    </div>
                     <div class="col">
                        <span class="col-title">
                            Cashier
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Actions
                        </span>
                    </div>
                </div>
                @foreach($branches as $branch)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            {{ $branch->branch_name }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $branch->branch_city }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $branch->branch_country }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $branch->branch_operating_hours }}
                        </span>
                    </div>
                    <div class="col">
                         @foreach($cashiers as $cashier)
                         <span class="col-title">
                            @if($cashier['branch_id']==$branch['id'])
                                {{$cashier->username}}
                            @endif
                        </span>
                        @endforeach
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <a href="{{ route('branches.show', $branch) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                <i class="far fa-eye"></i>
                            </a>
                        </span>
                        <span class="col-title">
                            <a href="{{ route('branches.edit', $branch) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                <i class="far fa-edit"></i>
                            </a>
                        </span>
                        <span class="col-title">
                            <form action="{{ route('branches.destroy', $branch) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this branch? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('branches.store') }}" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Branch</h5>
                        <div class="modal-action">
                            <a @click="hideModal" class="close-btn" data-dismiss="modal">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="branch_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('branch_name') ? ' is-invalid' : '' }}" value="{{ old('branch_name') }}" required autofocus>
                            <label for="input-name">Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="branch_street" id="input-branch_street" class="form-control form-control-alternative" value="{{ old('branch_street') }}" required>
                            <label for="input-branch_street">Street</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="branch_city" id="input-branch_city" class="form-control form-control-alternative" value="{{ old('branch_city') }}" required>
                            <label for="input-branch_city">City</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="branch_state" id="input-branch_state" class="form-control form-control-alternative" value="{{ old('branch_state') }}" required>
                            <label for="input-branch_state">Region</label>
                        </div>
                        <div class="form-group">
                            <input type="number" name="branch_post_code" id="input-branch_post_code" class="form-control form-control-alternative" value="{{ old('branch_post_code') }}" required>
                            <label for="input-branch_post_code">Post Code</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="branch_country" id="input-branch_country" class="form-control form-control-alternative" value="{{ old('branch_country') }}" required>
                            <label for="input-branch_country">Country</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="branch_contact_number" id="input-branch_contact_number" maxlength="12" class="form-control form-control-alternative" value="{{ old('branch_contact_number') }}" required>
                            <label for="input-branch_contact_number">Contact Number</label>
                        </div>
                        <div class="form-group">
                           <input type="text" name="branch_operating_hours" id="input-branch_operating_hours" class="form-control form-control-alternative"value="{{ old('branch_operating_hours') }}" required>
                            <label for="branch_operating_hours">Operating Hours</label>
                        </div>
                        <div class="form-group">
                           <input type="text" name="branch_other_info" id="input-branch_other_info" class="form-control form-control-alternative" value="{{ old('branch_other_info') }}" >
                            <label for="input-branch_other_info">Additional Information</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success mt-4">Save</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>

<!-- div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Branches</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('branches.create') }}" class="btn btn-sm btn-primary">New Branch</a>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">

                                <th scope="col">Branch Name</th>

                                <th scope="col">City</th>
                                <th scope="col">Country</th>
                                <th scope="col">Operating Hours</th>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                <tr>
   
                                    <td>{{ $branch->branch_name }}</td>

                                    <td>{{ $branch->branch_city }}</td>

                                    <td>{{ $branch->branch_country }}</td>
   
                                    <td>{{ $branch->branch_operating_hours }}</td>
                                   
                                
                                    <td class="td-actions text-right">
                                        <a href="{{ route('branches.show', $branch) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('branches.edit', $branch) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('branches.destroy', $branch) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Branch" onclick="confirm('Are you sure you want to remove this branch? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $branches->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div -->
    @endsection