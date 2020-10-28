@extends('dashboard.main', ['page' => 'List of Categories', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')

<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Employees Overview</strong> - Cashiers  <br>
            </h3>
            <div class="overview-new">
                <button class="new-item" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i>
                    <span>Cashier Role</span>
                </button>
            </div>
            <div class="overview-new">
                <button onclick="window.location.href='{{ route('cashier.index') }}'" class="new-item">
                    <i class="fas"></i>
                    <span>View Cashiers</span>
                </button>
            </div>
        </div>
        <div class="overview-table">
            <div class="table">
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            {{ __('Cashier Role ID') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Cashier Role') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Description') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Actions') }}
                        </span>
                    </div>
                </div>
                @foreach($roles as $role)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            {{ $role->id}}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title"  v-for="role in roles">
                            {{ $role->cashier_role_title }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $role->description }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <span class="col-title">
                                <span class="col-title">
                                    <form action="{{ route('cashier_role.destroy', $role) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this cashier role? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <form method="post" action="{{ route('cashier_role.store') }}" autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-header">
                          <h5 class="modal-title">Add Cashier</h5>
                          <div class="modal-action">
                              <a @click="hideModal" class="close-btn" data-dismiss="modal">
                                  <i class="fas fa-times"></i>
                              </a>
                          </div>
                      </div>
                      <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="cashier_role_title" id="cashier_role_title" required pattern="\S+.*" value="{{ old('cashier_role_title') }}">
                                <label for="cashier_role_title">Cashier Role</label>
                              </div>
                            <div class="form-group">
                              <input type="text" name="description" id="description" required pattern="\S+.*" value="{{ old('description') }}">
                              <label for="description">Description</label>
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
@endsection
