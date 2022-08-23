@extends('master.admin.master')

@section('pageTitle')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add Sub-Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sub-Category Module</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Module</a></li>
                        <li class="breadcrumb-item active">Edit Sub-Category</li>
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
                    <h4 class="text-center card-title mb-0 flex-grow-1">Edit Sub-Category Form</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <p class="text-center text-success">{{Session::get('message')}}</p>
                        <form action="{{route('sub-category.update', ['id' => $subCategory->id])}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="categoryName" class="form-label">Category Name</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-control" name="category_id">
                                        <option class="text-center"> --- Select Category Name ---</option>
                                        @foreach($categories as $category)
                                            <option class="text-center" value="{{$category->id}}" {{$category->id == $subCategory->category_id ? 'selected' : ''}}> {{$category->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="categoryName" class="form-label">Sub-Category Name</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="name" value="{{$subCategory->name}}" class="form-control" id="categoryName" placeholder="Enter Sub-Category Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="description" class="form-label">Sub-Category Description</label>
                                </div>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="description" id="description">{{$subCategory->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="imageInput" class="form-label">Sub-Category Image</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="file" name="image" class="form-control-file" id="imageInput">
                                    <div><hr></div>
                                    <h6><b>Old Photo:</b></h6>
                                    <img src="{{asset($subCategory->image)}}" height="100" width="120" alt="">
                                </div>
                            </div>
                            <div class="row mb-3">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Sub-Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection
