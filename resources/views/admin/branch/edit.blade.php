@extends('admin.layouts.inc.master')
@section('title','Edit Existing Branch')
@push('css')
@endpush
@section('content')
<div class="col-12">
    @include('admin.alert');
</div>

<livewire:admin.branch.edit :branch="$branch"/>

@stop
@push('js')
@endpush