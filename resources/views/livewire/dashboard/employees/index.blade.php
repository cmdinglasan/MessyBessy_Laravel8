<div class="db-employee-wrapper flex h-screen">
	<div class="employee-sidebar bg-gray-100 h-full relative" style="width: 320px;">
		<div class="sidebar-title px-4 pt-5 pb-3">
			<h3 class="font-black text-2xl">Accounts</h3>
		</div>
		<div class="sidebar-search px-4 pb-2 pt-3">
			<div class="form-group">
				<input type="text" placeholder="Search account here..." wire:model="query" class="bg-gray-200 w-full p-3 outline-none"/>
			</div>
		</div>
		<div class="sidebar-content relative h-auto scrolling-auto">
			<div class="account-list">
				@if(!empty($query))
					@foreach($results as $user)
						<a href="?userID={{ $user['id'] }}" class="p-4 hover:bg-gray-200 block flex hover:no-underline hover:text-gray-800">
							<div class="account-photo w-8 mr-3 align-middle">
								<img class="h-8 w-8 rounded-full object-cover" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
							</div>
							<div class="account-info flex-auto align-middle">
								<h4 class="account-name font-bold mb-0">
									{{ $user['name'] }}
								</h4>
								<span class="account-role text-xs -mt-1 capitalize">
								@if(!empty($user['current_team_id']))
									@foreach($roles as $role)
										@if($user['id'] == $role->user_id)
											{{ $role->user_id }}
										@endif
									@endforeach
								@else
									@foreach($roles as $role)
										@if($user['id'] == $role->user_id)
											{{ $role->role }}
										@endif
									@endforeach
								@endif
								</span>
							</div>
						</a></a>
					@endforeach
				@else
					@foreach($users as $user)
						<a href="?userID={{ $user['id'] }}" class="p-4 block hover:bg-gray-200 flex hover:no-underline hover:text-gray-800 @if($user['id'] == $userID) bg-gray-200 @else @endif">
							<div class="account-photo w-8 mr-3 align-middle">
								<img class="h-8 w-8 rounded-full object-cover" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
							</div>
							<div class="account-info flex-auto align-middle">
								<h4 class="account-name font-bold mb-0">
									{{ $user['name'] }}
								</h4>
								<span class="account-role text-xs -mt-1 capitalize">
								@if(!empty($user['current_team_id']))
									@foreach($roles as $role)
										@if($user['id'] == $role->user_id)
											{{ $role->user_id }}
										@endif
									@endforeach
								@else
									@foreach($roles as $role)
										@if($user['id'] == $role->user_id)
											{{ $role->role }}
										@endif
									@endforeach
								@endif
								</span>
							</div>
						</a></a>
					@endforeach
				@endif
			</div>
		</div>
	</div>
	<div class="bg-white flex-auto m-5">
		<div class="container">
			@if(!empty($userID))
				@foreach($userInfo as $user)
					<div class="account">
						<div class="account-details flex">
							<div class="account-photo flex w-24 mr-10">
								<img class="h-24 w-24 rounded-full object-cover" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
							</div>
							<div class="account-info flex-auto">
								<h2 class="text-4xl font-black">
									{{ $user['name'] }}
								</h2>
								<span class="capitalize font-bold block">
									@if(!empty($user['current_team_id']))
										@foreach($roles as $role)
											@if($user['id'] == $role->user_id)
												{{ $role->user_id }}
											@endif
										@endforeach
									@else
										@foreach($roles as $role)
											@if($user['id'] == $role->user_id)
												{{ $role->role }}
											@endif
										@endforeach
									@endif
								</span>
								<span class="text-gray-500">
									@foreach($teams as $team)
										@if($user['id'] == $team['user_id'])
											@if($team['personal_team'] == $team['id'])
												{{ $team['name'] }}
											@endif
										@endif
									@endforeach
								</span>
							</div>
						</div>
						<div class="account-overview my-10">

						<button class="btn btn-primary" onclick="test();">Edit</button>

						<button wire:click="update()" class="btn btn-primary">Save</button>
						
							<div class="form">
								<div class="form-group">
									<label for="name" class="text-xs uppercase text-gray-400 font-bold">Name</label>
									<input type="text" id="name" value="{{ $user['name'] }}" class="form-control" readonly="" />
								</div>
								<div class="row">
									<div class="form-group col">
										<label for="email" class="text-xs uppercase text-gray-400 font-bold">Email Address</label>
										<input type="email" id="email" value="{{ $user['email'] }}" class="form-control" readonly="" />
									</div>
									<div class="form-group col">
										<label for="email_verify" class="text-xs uppercase text-gray-400 font-bold">Verified?</label>
										<input type="text" id="email_verify" value="@if(!empty($user['email_verified_at'])) Yes @else No @endif" class="form-control" disabled="" />
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="text-xs uppercase text-gray-400 font-bold">Password</label>
									<input type="text" value="Hidden" class="form-control" disabled="" />
								</div>
							</div>
						</div>
						<div class="account-activity">
							<div class="activity-header my-3">
								<h4 class="text-xl font-bold">Activity Log</h4>
							</div>
							<div class="activity-log">
								<span>To be implemented</span>
							</div>
						</div>
					</div>
				@endforeach
			@else
				<div class="account">
					<div class="account-details flex">
						<div class="account-info flex-auto">
							<h2 class="text-4xl font-black">
								Select an account
							</h2>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
<script>
	function test() {
		let name = document.getElementById('name');
		name.removeAttribute('readonly');
		let email = document.getElementById('email');
		email.removeAttribute('readonly');
		// let password = document.getElementById('password');
		// password.removeAttribute('disabled');
		// password.setAttribute('value', "");
		// password.setAttribute('placeholder', "Enter password");

	}
	// function save() {
	// 	let name = document.getElementById('name');
	// 	name.setAttribute('readonly', "");
	// 	let email = document.getElementById('email');
	// 	email.setAttribute('readonly', "");
	// 	let password = document.getElementById('password');
	// 	password.setAttribute('disabled', "");
	// 	password.setAttribute('value', "Hidden");


	// }
</script>