<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Employees
		</div>
		<div class="header-subtitle">
			Check all your Messy employees.
		</div>
		<div class="header-action">
			<a href="#settings" class="btn header-btn">
				Go to settings
			</a>
		</div>
		<div class="header-image">
		</div>
	</div>
</div>
<div class="db-content">
	<div class="container">
		<div class="">
			<input type="text" class="form-control w-100" placeholder='Search' placeholder="Search" wire:model="query" />
        </div>
		<table class="table-auto sortable w-100">
		  <thead class="sticky top-0">
		    <tr class="border-b border-gray-100">
              <th class="p-4 text-blue-500 uppercase">Profile Photo</th>
		      <th class="p-4 text-blue-500 uppercase">Branch</th>
		      <th class="p-4 text-blue-500 uppercase">Name</th>
              <th class="p-4 text-blue-500 uppercase">Email</th>
              <th class="p-4 text-blue-500 uppercase">Last Login</th>
		    </tr>
		  </thead>
		  <tbody>
            @foreach($users as $user)
				<tr class="border-b border-gray-100">
                    <td class="p-4 text-gray-500"></td>
                    <td class="p-4 text-gray-500">{{ $user->branch_id }} </td>
                    <td class="p-4 text-gray-500">{{ $user->name }} </td>
                    <td class="p-4 text-gray-500">{{ $user->email }} </td>
                    <td class="p-4 text-gray-500">{{ $user->last_login_at }}</td>
              </tr>
              @endforeach
		  </tbody>
        </table>
	</div>
</div>
