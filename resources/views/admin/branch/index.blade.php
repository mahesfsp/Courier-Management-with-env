@extends('admin.layouts.inc.master')
@section('title','Company Master')
@push('css')
@endpush
@section('content')
<div class="col-12">
    @include('admin.alert');
</div>
<div class="card">
    <div class="card-header">
        <div class="row">

            <div class="col-6">
                <h3 class="card-title">View All Branch</h3>
            </div>


            <div class="col-6 text-right">
                <a href="{{route('admin.branch.add')}}" class="btn btn-primary btn-sm">Add New Branch</a>
            </div>

        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                        aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Sl. No
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Branch Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($branches as $key => $branch)
                            <tr class="odd">
                              
                                <td>{{$key + 1}}</td>
                                <td>{{$branch->branch_name}}</td>
                                <td>{{$branch->branch_address}}</td>
                                <td>{{$branch->branch_phone}}</td>
                                <td>{{$branch->branch_email}}</td>
                                <td><a href="{{route('admin.branch.edit',$branch->id)}}"
                                        class="btn border btn-primary-outline btn-sm">Modify</a></td>
                                <td><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $branch->id }}').submit()"
                                        class="btn border bg-color-blue btn-danger-outline btn-sm">Delete</a>

                                    <form action=" {{ route('admin.branch.delete', $branch->id) }}"
                                        style="display:none;" method="post" id="delete-form-{{ $branch->id }}">
                                        @csrf
                                        @method('DELETE');
                                    </form>
                                </td>

                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of
                        57 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#"
                                    aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="example2"
                                    data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2"
                                    tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3"
                                    tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4"
                                    tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5"
                                    tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6"
                                    tabindex="0" class="page-link">6</a></li>
                            <li class="paginate_button page-item next" id="example2_next"><a href="#"
                                    aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@stop
@push('js')
@endpush