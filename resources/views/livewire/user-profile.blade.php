<div>
    <label>Name</label>
    <input wire:model="name" type="text" class="form-control" />
    @if($errors->has('name'))
        <p style="color: red">{{$errors->first('name')}}</p>
    @endif

    <label>Email</label>
    <input wire:model="email" type="text" class="form-control" />
    @if($errors->has('email'))
        <p style="color: red">{{$errors->first('email')}}</p>
    @endif
</br>
    <button wire:click="save" class="btn btn-primary">Save</button>
</div>
