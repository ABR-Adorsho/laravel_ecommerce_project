@extends('master.admin.master')

@section('pageTitle')
    <!--------------- Datatable Stylesheets -->
    <link href="{{asset('/')}}admin/assets/css-dt/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Units</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Unit Module</a></li>
                        <li class="breadcrumb-item active">Manage Units</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection

@section('mainContent')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Units Info</h4>
                    <table id="datatable" class="table table-striped table-centered dt-responsive nowrap table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Unit Name</th>
                            <th>Unit Description</th>
                            <th>Unit Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <h6 class="mt-0 mb-1">{{$unit->name}}</h6>
                                </td>
                                <td>{{$unit->description}}</td>
                                <td >{{$unit->status == 1 ? 'published' : 'unpublished'}}</td>
                                <td>
                                    <a href="{{route('unit.edit', ['id' => $unit->id])}}" class="btn btn-success btn-sm">
                                        <i class="ri-pencil-fill fs-13"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('UnitDeleteForm{{$unit->id}}').submit();">
                                        <i class="ri-delete-bin-fill fs-13"></i>
                                    </a>
                                    <form action="{{route('unit.delete', ['id' => $unit->id])}}" method="post" id="UnitDeleteForm{{$unit->id}}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
