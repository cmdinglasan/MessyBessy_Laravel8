<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      

    <div class="fixed inset-0 transition-opacity">

      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

    </div>

  

    <!-- This element is to trick the browser into centering the modal contents. -->

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

  

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

      <form>

      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

        <div class="">

              <div class="mb-4">

                  <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Branch Name</label>

                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Branch Name" wire:model="branch_name">

                  @error('branch_name') <span class="text-red-500">{{ $message }}</span>@enderror

              </div>

              <div class="mb-4">

                  <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Street</label>

                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" placeholder="Enter Street" wire:model="branch_street">

                  @error('branch_street') <span class="text-red-500">{{ $message }}</span>@enderror

              </div>
              <div class="mb-4">

                  <label for="exampleFormControlInput3" class="block text-gray-700 text-sm font-bold mb-2">City</label>

                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput3" placeholder="Enter City" wire:model="branch_city">

                  @error('branch_city') <span class="text-red-500">{{ $message }}</span>@enderror

              </div>
              <div class="mb-4">

                  <label for="exampleFormControlInput4" class="block text-gray-700 text-sm font-bold mb-2">Region</label>

                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput4" placeholder="Enter Region" wire:model="branch_state">

                  @error('branch_state') <span class="text-red-500">{{ $message }}</span>@enderror

              </div>
              <div class="mb-4">

                  <label for="exampleFormControlInput5" class="block text-gray-700 text-sm font-bold mb-2">Post Code</label>

                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput5" placeholder="Enter Post Code" wire:model="branch_post_code">

                  @error('branch_post_code') <span class="text-red-500">{{ $message }}</span>@enderror

              </div>
              <div class="mb-4">

                  <label for="exampleFormControlInput6" class="block text-gray-700 text-sm font-bold mb-2">Country</label>

                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput6" placeholder="Enter Country" wire:model="branch_country">

                  @error('branch_country') <span class="text-red-500">{{ $message }}</span>@enderror

              </div>
              <div class="mb-4">

                  <label for="exampleFormControlInput7" class="block text-gray-700 text-sm font-bold mb-2">Contact Number</label>

                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput7" placeholder="Enter Contact Number" wire:model="branch_contact_number">

                  @error('branch_contact_number') <span class="text-red-500">{{ $message }}</span>@enderror

              </div>
              <div class="mb-4">

                  <label for="exampleFormControlInput8" class="block text-gray-700 text-sm font-bold mb-2">Operating Hours</label>

                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput8" placeholder="Enter Operating Hours" wire:model="branch_operating_hours">

                  @error('branch_operating_hours') <span class="text-red-500">{{ $message }}</span>@enderror

              </div>
              <div class="mb-4">

                  <label for="exampleFormControlInput9" class="block text-gray-700 text-sm font-bold mb-2">Other Info</label>

                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput9" placeholder="Enter Other Info" wire:model="branch_other_info">

                  @error('branch_other_info') <span class="text-red-500">{{ $message }}</span>@enderror

              </div>

        </div>

      </div>

  

      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

          <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">

            Save

          </button>

        </span>

        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

            

          <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

            Cancel

          </button>

        </span>

        </form>

      </div>

        

    </div>

  </div>

</div>