<div>

@if(isset($selectedItem))
<div class="modal fade show id-{{ $selectedItem }}" id="deleteProduct" tabindex="-1" role="dialog" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-red-500 text-white">
        <form>
            <div class="modal-header mb-0 text-center">
                <h5 class="modal-title w-100">
                	<i class="fas fa-exclamation-triangle mr-3 opacity-25"></i>Delete Product
            	</h5>
            </div>
            <div class="modal-body m-0 text-center">
            	<div class="row px-3 pb-3 ">
                    <center>
                    	<span class="d-block" style="text-align: center; width: 100%;">Are you want to {{ $action }} record {{ $selectedItem }}?</span>
                    </center>
                </div>
                <div class="row flex mt-3 mx-1 ">
                	<div class="col">
                    	<button class="p-3 bg-red-700 rounded-md text-white mr-3" data-dismiss="modal">
                    		Cancel
                    	</button>
                    </div>
                    <div class="col text-right">
                    	<button class="p-3 bg-white rounded-md text-red-500" data-dismiss="modal">
                    		Sure, Delete it!
                    	</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
@endif

	<div class="">
		<input type="text" class="form-input w-100" wire:model="query" placeholder="Search"/>

		@if(isset($selectedItem))
			<span class="id-{{ $selectedItem }}">Will {{ $action }} ProductId {{ $selectedItem }}</span>
		@endif
	</div>

	<table class="table-auto sortable w-100">
	  <thead class="sticky top-0">
	    <tr class="border-b border-gray-100">
	      <th class="p-4 text-blue-500 uppercase">Branch Name</th>
	      <th class="p-4 text-blue-500 uppercase">Country</th>
	    </tr>
	  </thead>
	  <tbody>
		@if(!empty($query))
			@if(!empty($results))
				@foreach($results as $result)
				<tr class="result hover:bg-gray-100">
					<td class="p-4">
						<div class="product-info">
							<h4 class="font-bold">
								<a href="{{ route('dashboard-categories-show', 'catId='.$result['id']) }}">
                                    <span>{{ $result['branch_name'] }}</span>
                                </a>
							</h4>
						</div>
					</td>
					<td class="p-4">
						<div class="product-info">
                            <h4>
                                <span>{{ $result['branch_country'] }}</span>
                            </h4>
						</div>
					</td>
					<td class="p-4">
						<div class="product-action">
							<button class="btn editProduct bg-blue-400 hover:bg-blue-500 text-center text-white ml-2" role="button" wire:click="selectItem({{ $result['id'] }}, 'edit')">
							<i class="fas fa-plus"></i>
							<span>Edit</span>
							</button>
							<button class="btn deleteProduct bg-red-400 hover:bg-red-500 text-center text-white ml-2" role="button" wire:click="selectItem({{ $result['id'] }}, 'delete')">
							<i class="fas fa-trash"></i>
							<span>Delete</span>
							</button>
						</div>
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="5">
						<div class="result error text-center">
							<span class="error-text">No results found. Try searching again.</span>
						</div>
					</td>
				</tr>
			@endif
		@else
        @if(!empty($branches))
			@foreach($branches as $result)
				<tr class="result hover:bg-gray-100">
					<td class="p-4">
						<div class="product-info">
                            <h4 class="font-bold">
                                <a href="{{ route('dashboard-categories-show','catId='.$result['id']) }}">
                                    <span>{{ $result['branch_name'] }}</span>
                                </a>
                            </h4>
						</div>
					</td>
					<td class="p-4">
						<div class="product-info">
                            <h4>
                                <span>{{ $result['branch_country'] }}</span>
                            </h4>
						</div>
					</td>
					<td class="p-4">
						<div class="product-action">
							<button class="btn editProduct bg-blue-400 hover:bg-blue-500 text-center text-white ml-2" role="button" wire:click="selectItem({{ $result['id'] }}, 'edit')">
							<i class="fas fa-plus"></i>
							<span>Edit</span>
							</button>
							<button class="btn deleteProduct bg-red-400 hover:bg-red-500 text-center text-white ml-2" role="button" wire:click="selectItem({{ $result['id'] }}, 'delete')">
							<i class="fas fa-trash"></i>
							<span>Delete</span>
							</button>
						</div>
					</td>
				</tr>
			@endforeach
        @else
            <tr>
                <td colspan="5">
                    <div class="result error text-center m-3 text-gray-600">
                        <i class="fas fa-exclamation-triangle text-2xl mb-2"></i><br/>
                        <span class="error-text">Whoops! There are no branches here. Add some.</span>
                    </div>
                </td>
            </tr>
        @endif
		@endif
	  </tbody>
	</table>

@if(!$updateMode)
<div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" role="dialog" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form>
            <div class="modal-header">
                <h5 class="modal-title">Edit Branch</h5>
                <div class="modal-action">
                    <a @click="hideModal" class="close-btn" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="modal-body">
            	<div class="row">
                    <div class="form-group col">
                        <input type="text" pattern="\S+.*" wire:model="branch_name">
                        <label for="min_stock">Branch Name</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="store()" type="submit" class="btn btn-success mt-4">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endif