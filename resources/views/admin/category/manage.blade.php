@extends('master.admin.master')

@section('pageTitle')
    <!--------------- Datatable Stylesheets -->
    <link href="{{asset('/')}}admin/assets/css-dt/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Categories</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Category Module</a></li>
                        <li class="breadcrumb-item active">Manage Categories</li>
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
                    <h4 class="card-title mb-3">All Categories Info</h4>
                    <table id="datatable" class="table table-striped table-centered dt-responsive nowrap table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Publication Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <h6 class="mt-0 mb-1">{{$category->name}}</h6>
                                <p class="m-0 font-size-14">{{$category->description}}</p>
                            </td>
                            <td class="product-list-img">
                                <img src="{{asset($category->image)}}" class="img-fluid avatar-md rounded" alt="tbl">
                            </td>
                            <td >{{$category->status == 1 ? 'published' : 'unpublished'}}</td>
                            <td>
                                <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-success btn-sm">
                                    <i class="ri-pencil-fill fs-13"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('CategoryDeleteForm{{$category->id}}').submit();">
                                    <i class="ri-delete-bin-fill fs-13"></i>
                                </a>
                                <form action="{{route('category.delete', ['id' => $category->id])}}" method="post" id="CategoryDeleteForm{{$category->id}}">
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
