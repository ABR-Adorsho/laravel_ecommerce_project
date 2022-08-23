@extends('master.admin.master')

@section('pageTitle')

    <!--------------- Datatable Stylesheets -->
    <link href="{{asset('/')}}admin/assets/css-dt/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Products</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product Module</a></li>
                        <li class="breadcrumb-item active">Manage Products</li>
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
                    <h4 class="card-title mb-4">All Product Info</h4>
                    <table id="datatable" class="table table-striped table-centered dt-responsive nowrap table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Selling Price</th>
                            <th>Stock Amount</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->name}}</td>
                                <td class="product-list-img">
                                    <img src="{{asset($product->image)}}" class="img-fluid avatar-md rounded" alt="tbl">
                                </td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->stock_amount}}</td>
                                <td >{{$product->status == 1 ? 'published' : 'unpublished'}}</td>
                                <td>
                                    <a href="{{route('product.detail', ['id' => $product->id])}}" class="btn btn-primary btn-sm">
                                        <i class="ri-eye-fill fs-13"></i>
                                    </a>

                                    <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success btn-sm">
                                        <i class="ri-pencil-fill fs-13"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('ProductDeleteForm{{$product->id}}').submit();">
                                        <i class="ri-delete-bin-fill fs-13"></i>
                                    </a>
                                    <form action="{{route('product.delete', ['id' => $product->id])}}" method="post" id="ProductDeleteForm{{$product->id}}">
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
