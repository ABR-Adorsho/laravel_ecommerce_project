@extends('master.admin.master')

@section('pageTitle')
    <!--------------- Datatable Stylesheets -->
    <link href="{{asset('/')}}admin/assets/css-dt/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Brands</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Brand Module</a></li>
                        <li class="breadcrumb-item active">Manage Brands</li>
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
                    <h4 class="card-title mb-3">All Brands Info</h4>
                    <table id="datatable" class="table table-striped table-centered dt-responsive nowrap table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand Name</th>
                                <th>Brand Image</th>
                                <th>Brand Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <h6 class="mt-0 mb-1">{{$brand->name}}</h6>
                                    <p class="m-0 font-size-14">{{$brand->description}}</p>
                                </td>
                                <td class="product-list-img">
                                    <img src="{{asset($brand->image)}}" class="img-fluid avatar-md rounded" alt="tbl">
                                </td>
                                <td >{{$brand->status == 1 ? 'published' : 'unpublished'}}</td>
                                <td>
                                    <a href="{{route('brand.edit', ['id' => $brand->id])}}" class="btn btn-success btn-sm">
                                        <i class="ri-pencil-fill fs-13"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('BrandDeleteForm{{$brand->id}}').submit();">
                                        <i class="ri-delete-bin-fill fs-13"></i>
                                    </a>
                                    <form action="{{route('brand.delete', ['id' => $brand->id])}}" method="post" id="BrandDeleteForm{{$brand->id}}">
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
