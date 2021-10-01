@extends('admin.layouts.inc.master')
@section('title','Send Courier')
@push('css')
@endpush
@section('content')
<div class="col-12">
    @include('admin.alert');
</div>
<div class="col-mo-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="m-0" id="heading">
                Send New Courier
            </h5>
        </div>
        <form action="{{route('staff.courier.action')}}" id="courier-action-form" enctype='multipart/form-data'
            method="post">

            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="col-12 mt-3">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" rows="4" class="form-control"></textarea>
                        @error('remarks')
                        <small class="text-danger">{{$message}}</small>
                        
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <label for="days_remaining">Days Remaining for deliver</label>
                        <input type="text" name="days_remaining" id="days_remaining" class="form-control" />
                        @error('days_remaining')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                  
                    <div class="col-3 mt-3">
                        <label for="status_id">Courier Status</label>
                        <select id="StatusSelector" class="form-control" name="status_id" required="required">
                            <option value="" selected disabled>Select Staus</option>
                            @foreach($status as $s)
                            <option id="{{$s->id}}" value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    


                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <button type="Submit" class="btn btn-primary">Add Courier Action</button>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('staff.dashboard')}}" class="btn btn-secondary">Back</a>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>



@stop
@push('js')


@endpush