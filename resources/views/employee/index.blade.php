@extends('dashboard.main', ['page' => 'List of Categories', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')

<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Employees Overview</strong> - Admin  <br>
            </h3>
            <div class="overview-new">
                <button onclick="window.location.href='{{ route('register') }}'" class="new-item">
                    <i class="fas fa-plus"></i>
                    <span>Add Employee</span>
                </button>
            </div>
            <div class="overview-new">
                <button onclick="window.location.href='{{ route('cashier.index') }}'" class="new-item">
                    <i class="fas"></i>
                    <span>View Cashier</span>
                </button>
            </div>
        </div>
        <div class="overview-table">
            <div class="table">
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            {{ __('Profile Image') }}
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
                            {{ __('Email') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('') }}
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
                @foreach($users as $user)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            @if (is_null($user->profile_image))
                                <img src="{{ asset('img/user/default.jpg') }}" style="width:50px; height:50px; border-radius:50%;">
                            @else
                                <img src="{{ asset('./img/uploads/profile_image/'.$user->profile_image) }}" style="width:50px; height:50px; border-radius:50%;" />
                            @endif
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $user->firstName }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $user->lastName }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title" wrap="hard">
                            {{ $user->email }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">

                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $user->created_at->format('d/m/Y H:i') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $user->last_login_at }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Actions
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('employee.create') }}" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Employee</h5>
                        <div class="modal-action">
                            <a @click="hideModal" class="close-btn" data-dismiss="modal">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" id="name" required pattern="\S+.*" value="{{ old('name') }}">
                            <label for="name">Name</label>
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
