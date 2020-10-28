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
                    <span>Cashier</span>
                </button>
            </div>
            <div class="overview-new">
                <button onclick="window.location.href='{{ route('cashier_role.view') }}'" class="new-item">
                    <i class="fas"></i>
                    <span>View Cashier Roles</span>
                </button>
            </div>
        </div>
        <div class="overview-table">
            <div class="table">
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            {{ __('Branch') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Cashier Role') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('First Name') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Last Name') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Phone') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Email') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Created at') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Last Login') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Actions') }}
                        </span>
                    </div>
                </div>
                @foreach($cashiers as $cashier)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            {{ $cashier->branch_id }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title"  v-for="role in roles">
                            {{ $cashier->cashier_role_id }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $cashier->firstName }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $cashier->lastName }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $cashier->phone }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $cashier->email }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $cashier->created_at->format('d/m/Y H:i') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $cashier->last_login_at }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <span class="col-title">
                                <form action="{{ route('cashier.destroy', $cashier) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this cashier? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
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
                  <form method="post" action="{{ route('cashier.store') }}" autocomplete="off" enctype="multipart/form-data">
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
                                <select name="branch_id" id="branch" required pattern="\S+.*" value="{{ old('branch_id') }}">
                                    @foreach ($branches as $branch)
                                         @if($branch['id'] == old('document'))
                                            <option value="{{$branch['id']}}" selected>{{$branch['branch_name']}}</option>
                                        @else
                                            <option value="{{$branch['id']}}">{{$branch['branch_name']}}</option>
                                         @endif
                                    @endforeach
                                </select>
                                <label for="branch_id">Branch</label>
                            </div>
                            <div class="form-group">
                                <select name="cashier_role_id" id="role" required pattern="\S+.*" value="{{ old('cashier_role_id') }}">
                                    @foreach ($roles as $role)
                                         @if($role['id'] == old('document'))
                                            <option value="{{$role['id']}}" selected>{{$role['cashier_role_title']}}</option>
                                        @else
                                            <option value="{{$role['id']}}">{{$role['cashier_role_title']}}</option>
                                         @endif
                                    @endforeach
                                </select>
                                <label for="branch_id">Cashier Role</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" id="username" required pattern="\S+.*" value="{{ old('username') }}">
                                <label for="username">Username</label>
                              </div>
                            <div class="form-group">
                              <input type="text" name="firstName" id="firstName" required pattern="\S+.*" value="{{ old('firstName') }}">
                              <label for="firstName">First Name</label>
                            </div>
                            <div class="form-group">
                              <input type="text" name="lastName" id="lastName" required pattern="\S+.*" value="{{ old('lastName') }}">
                              <label for="lastName">Last Name</label>
                            </div>
                            <div class="form-group">
                              <input type="email" name="email" id="email" required pattern="\S+.*" value="{{ old('email') }}">
                              <label for="email">Email Address</label>
                            </div>
                            <div class="form-group">
                              <input type="tel" name="phone" id="phone" required pattern="\S+.*" value="{{ old('phone') }}" maxlength="13">
                              <label for="phone">Phone Number</label>
                            </div>
                            <div class="form-group">
                              <input type="phone" name="phone" id="phone" required pattern="\S+.*" value="{{ old('phone') }}">
                              <label for="phone">Phone Number</label>
                            </div>
                            <div class="form-group row label">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            </div>
                            <div class="form-group row">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            </div>

                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="form-group row label">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            </div>
                            <div class="form-group row">
                                <div class="form-input">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
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
