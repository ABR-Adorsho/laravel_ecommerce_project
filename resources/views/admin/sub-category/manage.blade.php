@extends('master.admin.master')

@section('pageTitle')
    <!--------------- Datatable Stylesheets -->
    <link href="{{asset('/')}}admin/assets/css-dt/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Sub-Categories</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sub-Category Module</a></li>
                        <li class="breadcrumb-item active">Manage Sub-Categories</li>
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
                <h4 class="card-title mb-3">All Sub-Category Info</h4>
                <div class="card-body">
                    <h4 class="card-title mb-3">All Sub-Categories Info</h4>
                    <table id="datatable" class="table table-striped table-centered dt-responsive nowrap table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Sub-Categories Name</th>
                            <th>Sub-Categories Image</th>
                            <th>Sub-Categories Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subCategories as $subCategory)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <h6 class="mt-0 mb-1">{{$subCategory->name}}</h6>
                                    <p class="m-0 font-size-14">{{$subCategory->description}}</p>
                                </td>
                                <td class="product-list-img">
                                    <img src="{{asset($subCategory->image)}}" class="img-fluid avatar-md rounded" alt="tbl">
                                </td>
                                <td >{{$subCategory->status == 1 ? 'published' : 'unpublished'}}</td>
                                <td>
                                    <a href="{{route('sub-category.edit', ['id' => $subCategory->id])}}" class="btn btn-success btn-sm">
                                        <i class="ri-pencil-fill fs-13"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('SubCategoryDeleteForm{{$subCategory->id}}').submit();">
                                        <i class="ri-delete-bin-fill fs-13"></i>
                                    </a>
                                    <form action="{{route('sub-category.delete', ['id' => $subCategory->id])}}" method="post" id="SubCategoryDeleteForm{{$subCategory->id}}">
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
