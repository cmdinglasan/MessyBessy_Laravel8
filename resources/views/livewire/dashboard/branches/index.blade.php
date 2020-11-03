<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Branches
		</div>
		<div class="header-subtitle">
			Where are those branches at?
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
	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if (session()->has('message'))

                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">

                  <div class="flex">

                    <div>

                      <p class="text-sm">{{ session('message') }}</p>

                    </div>

                  </div>

                </div>

            @endif

            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Branch</button>

            @if($isOpen)

                @include('livewire.create')

            @endif

            <table class="table-fixed w-full">

                <thead>

                    <tr class="bg-gray-100">

                          <th class="p-4 text-blue-500 uppercase">Branch Name</th>
					      <th class="p-4 text-blue-500 uppercase">Street</th>
					      <th class="p-4 text-blue-500 uppercase">City</th>
					      <th class="p-4 text-blue-500 uppercase">Region</th>
					      <th class="p-4 text-blue-500 uppercase">Post Code</th>
					      <th class="p-4 text-blue-500 uppercase">Country</th>
					      <th class="p-4 text-blue-500 uppercase">Contact Number</th>
					      <th class="p-4 text-blue-500 uppercase">Operating Hours</th>
					      <th class="p-4 text-blue-500 uppercase">Other Info</th>
					      <th class="p-4 text-blue-500 uppercase">Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($branches as $branch)

                    <tr>

                          <tr class="border-b border-gray-100 hover:bg-gray-100">
					      <td class="border px-4 border-0 w-20">
					      	{{ $branch->branch_name }}
					      </td>
					      <td class="border px-4 border-0 w-20">
					      	{{ $branch->branch_street }}
					      </td>
					      <td class="border px-4 border-0 w-20">
					      	{{ $branch->branch_city }}
					      </td>
					      <td class="border px-4 border-0 w-20">
					      	{{ $branch->branch_state }}
					      </td>
					      <td class="border px-4 border-0 w-20">
					      	{{ $branch->branch_post_code }}
					      </td>
					      <td class="border px-4 border-0 w-20">
					      	{{ $branch->branch_country }}
					      </td>
					      <td class="border px-4 border-0 w-20">
					      	{{ $branch->branch_contact_number }}
					      </td>
					      <td class="border px-4 border-0 w-20">
					      	{{ $branch->branch_operating_hours }}
					      </td>
					      <td class="border px-4 border-0 w-20">
					      	{{ $branch->branch_other_info }}
					      </td>
					      <td>
                       		 <button wire:click="edit({{ $branch->id }})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Edit</button>

                            <button wire:click="delete({{ $branch->id }})" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">Delete</button>
                           </td>
                        

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
</div>