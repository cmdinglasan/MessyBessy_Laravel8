<div>
    <div class="dropdown show absolute origin-top-right right-0">
		<button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out p-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<div class="profile-photo mr-3">
           		<img class="h-8 w-8 rounded-full object-cover" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
           	</div>
           	<div class="profile-info text-left mr-3">
           		<h4 class="font-bold -mb-1">{{ $user['name'] }}</h4>
           		<span class="text-xs text-gray-500">Admin</span>
           	</div>
           	<div class="profile-action my-1">
           		<i class="fas fa-caret-down"></i>
           	</div>
        </button>
		<div class="dropdown-menu dropdown-menu-right absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0 rounded-md shadow-xs py-2 bg-white border-0" aria-labelledby="dropdownMenuButton">
			<h6 class="dropdown-header block px-4 py-2 text-xs text-gray-400">Manage Account</h6>
			<a class="dropdown-item block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="{{ route('profile.show') }}">Profile</a>

			<div class="dropdown-divider my-0"></div>

			<a class="dropdown-item block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="#">Settings</a>
			<a class="dropdown-item block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" method="POST" href="{{ route('logout') }}">Logout</a>
		</div>
	</div>
</div>
