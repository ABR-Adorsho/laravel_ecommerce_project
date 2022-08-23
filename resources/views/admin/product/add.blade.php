@extends('master.admin.master')

@section('pageTitle')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product Module</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                    <h4 class="card-title text-center mb-0 flex-grow-1">Add Product Form</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <form action="{{route('product.create')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label class="form-label">Category Name</label>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-control" name="category_id" onchange="getProductSubcategory(this.value)">
                                    <option value="">  ---- Select Product Category ---- </option>
                                    @foreach($categories as $category)
                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label class="form-label">Sub-Category Name</label>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-control" name="sub_category_id" id="subCategoryId">
                                    <option value="">  ---- Select Product Sub-Category Name ---- </option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label class="form-label">Brand Name</label>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-control" name="brand_id">
                                    <option value="">  ---- Select Product Brand Name ---- </option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label class="form-label">Unit Name</label>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-control" name="unit_id">
                                    <option value="">  ---- Select Product Unit  ---- </option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="name" class="form-label">Product Name</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="code" class="form-label">Product Code</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="code" class="form-control" id="code" placeholder="Enter product code">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="regular_price" class="form-label">Regular Price</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" name="regular_price" class="form-control" id="regular_price" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="selling_price" class="form-label">Selling Price</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" name="selling_price" class="form-control" id="selling_price" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="selling_price" class="form-label">Stock Amount</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" name="stock_amount" class="form-control" id="selling_price" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="description" class="form-label">Short Description</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="short_description" id="short_description" ></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="description" class="form-label">Long Description</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="form-control summernote" name="long_description" id="long_description" ></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="dateInput" class="form-label">Product Image</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="image" class="form-control-file" id="dateInput">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="dateInput" class="form-label">Product Other Image</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="other_image[]" multiple class="form-control-file" id="dateInput">
                            </div>
                        </div>
                        <div class="row mb-3">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

@endsection
