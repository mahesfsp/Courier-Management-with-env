@extends('admin.layouts.inc.master')
@section('title','Add New Branch')
@push('css')
@endpush
@section('content')
<div class="col-12">
    @include('admin.alert');
</div>

<livewire:admin.branch.add/>

@stop
@push('js')
@endpush