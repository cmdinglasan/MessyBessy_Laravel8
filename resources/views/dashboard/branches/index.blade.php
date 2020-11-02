@extends('dashboard.dashboard')

@section('content')

	@if (session()->has('message'))
                   <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @livewire('dashboard.branches.index')
    @livewireScripts

@endsection