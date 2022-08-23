@extends('master.admin.master')

@section('pageTitle')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Category Module</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection

@section('mainContent')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title text-center mb-0 flex-grow-1">Add Category Form</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <form action="{{route('category.create')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control" id="categoryName" placeholder="Enter category name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="description" class="form-label">Category Description</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="description" id="description" ></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="dateInput" class="form-label">Category Image</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="image" class="form-control-file" id="dateInput">
                            </div>
                        </div>
                        <div class="row mb-3">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

@endsection
