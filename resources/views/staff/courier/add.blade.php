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
        <form action="{{route('staff.courier.store')}}" id="courier-form" enctype='multipart/form-data' method="post">

            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <label for="sender_name">Sender Name</label>
                        <input type="text" name="sender_name" id="sender_name" class="form-control">
                        @error('sender_name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="sender_contact">Sender Contact no</label>
                        <input type="text" name="sender_contact" id="sender_contact" class="form-control" />
                        @error('sender_contact')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <label for="sender_address">Sender Address</label>
                        <textarea name="sender_address" id="sender_address" rows="4" class="form-control"></textarea>
                        @error('sender_address')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <label for="sender_city">Sender City</label>
                        <input type="text" name="sender_city" id="sender_city" class="form-control" />
                        @error('sender_city')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <label for="sender_state">Sender State</label>
                        <input type="text" name="sender_state" id="sender_state" class="form-control" />
                        @error('sender_state')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <label for="sender_pin">Sender Pincode</label>
                        <input type="text" name="sender_pin" id="sender_pin" class="form-control" />
                        @error('sender_pin')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-3 mt-3">
                        <label for="sender_country">Sender Country</label>
                        <input type="text" name="sender_country" id="sender_country" class="form-control" />
                        @error('sender_country')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="recipient_name">Recipient Name</label>
                        <input type="text" name="recipient_name" id="recipient_name" class="form-control">
                        @error('recipient_name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="recipient_contact">Recipient Contact no</label>
                        <input type="text" name="recipient_contact" id="recipient_contact" class="form-control" />
                        @error('recipient_contact')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <label for="recipient_address">Recipient Address</label>
                        <textarea name="recipient_address" id="sender_address" rows="4" class="form-control"></textarea>
                        @error('recipient_address')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <label for="recipient_city">Recipient City</label>
                        <input type="text" name="recipient_city" id="recipient_city" class="form-control" />
                        @error('recipient_city')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <label for="recipient_state">Recipient State</label>
                        <input type="text" name="recipient_state" id="recipient_state" class="form-control" />
                        @error('recipient_state')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <label for="recipient_pin">Recipient Pincode</label>
                        <input type="text" name="recipient_pin" id="recipient_pin" class="form-control" />
                        @error('recipient_pin')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-3 mt-3">
                        <label for="recipient_country">Recipient Country</label>
                        <input type="text" name="recipient_country" id="recipient_country" class="form-control" />
                        @error('recipient_country')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <label for="courier_desc">Courier Description</label>
                        <textarea name="courier_desc" id="courier_desc" rows="4" class="form-control"></textarea>
                        @error('courier_desc')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-3 mt-3">
                        <label for="package_id">Package</label>
                        <select id="packageSelector" class="form-control" name="package_id" required="required">
                            <option value="" selected disabled>Select Package</option>
                            @foreach($packages as $p)
                            <option id="{{$p->net_amt}}" value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-3 mt-3">
                        <label for="weight">Weight</label>
                        <input type="text" name="weight" id="weight" class="form-control"/>
                        @error('weight')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>


                    <div class="col-3 mt-3">
                        <label for="lenght">Length</label>
                        <input type="text" name="lenght" id="lenght" class="form-control"/>
                        @error('lenght')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-3 mt-3">
                        <label for="breadth">Breadth</label>
                        <input type="text" name="breadth" id="breadth" class="form-control"/>
                        @error('breadth')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-3 mt-3">
                        <label for="height">Height</label>
                        <input type="text" name="height" id="height" class="form-control"/>
                        @error('height')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-3 mt-3">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control"/>
                        @error('price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-3 mt-3">
                        <label for="from_location">From Location</label>
                        <select id="FromLocationSelector" class="form-control" name="from_location" required="required">
                            <option value="" selected disabled>Select From Location</option>
                            @foreach($branches as $b)
                            <option value="{{$b->id}}">{{$b->branch_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3 mt-3">
                        <label for="to_location">To Location</label>
                        <select id="ToLocationSelector" class="form-control" name="to_location" required="required">
                            <option value="" selected disabled>Select To Location</option>
                            @foreach($branches as $b)
                            <option value="{{$b->id}}">{{$b->branch_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    

                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <button type="Submit" class="btn btn-primary">Send New Courier</button>
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
<script>
    $("#packageSelector").on('change', function () {

        var state= $(this).find('option:selected').attr('id');
        $("#price").val(state);
});
</script>

@endpush