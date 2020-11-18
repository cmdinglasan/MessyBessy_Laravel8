@extends('shop.app')

@section('content')
<div class="transaction-content">

    @livewire('transaction')
    {{-- @livewire('shop.modules.product-modal') --}}
    @livewireScripts
</div>
@endsection