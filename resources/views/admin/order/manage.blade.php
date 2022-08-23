@extends('master.admin.master')

@section('pageTitle')
    <!--------------- Datatable Stylesheets -->
    <link href="{{asset('/')}}admin/assets/css-dt/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Orders</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Order Module</a></li>
                        <li class="breadcrumb-item active">Manage Orders</li>
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
                    <h4 class="card-title mb-3">All Orders Info</h4>
                    <table id="datatable" class="table table-striped table-centered dt-responsive nowrap table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Customer Info</th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>Name: {{$order->customer->name}} <br>
                                    Mobile: {{$order->customer->mobile}}
                                </td>
                                <td>Tk. {{number_format($order->order_total)}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="{{route('admin.order-detail', ['id' => $order->id])}}" class="btn btn-info btn-sm">
                                        <i class="ri-eye-fill fs-13"></i>
                                    </a>

                                    <a href="{{route('admin.order-invoice', ['id' => $order->id])}}" class="btn btn-primary btn-sm">
                                        <i class="ri-file-text-fill fs-13"></i>
                                    </a>
                                    <a href="{{route('admin.order-invoice-download', ['id' => $order->id])}}" class="btn btn-warning btn-sm">
                                        <i class="ri-printer-fill fs-13"></i>
                                    </a>
                                    <a href="#showModal" data-bs-toggle="modal" class="btn btn-success btn-sm">
                                        <i class="ri-pencil-fill fs-13"></i>
                                    </a>
                                    <a data-bs-toggle="modal" href="#deleteOrder" class="btn btn-danger btn-sm" >
                                        <i class="ri-delete-bin-fill fs-13"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Order Info</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                </div>
                                <form action="{{route('admin.order-update', ['id' => $order->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-body">
                                        <input type="hidden" id="id-field" />

                                        <div class="mb-3" id="modal-id">
                                            <label for="orderId" class="form-label">ID</label>
                                            <input type="text" id="orderId" class="form-control" style="background-color: #D3D3D3; font-size: larger;" placeholder="#BT000{{$order->id}}" readonly />
                                        </div>

                                        <div class="mb-3">
                                            <label for="customeraddress-field" class="form-label">Delivery Address  </label><i class="mdi mdi-lead-pencil"></i>
                                            <input type="text" name="delivery_address" id="customeraddress-field" class="form-control" value="{{$order->delivery_address}}"/>
                                        </div>


                                        <div class="row gy-4 mb-3">
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="amount-field" class="form-label">Order Total</label>
                                                    <input type="text" style="background-color: #D3D3D3" id="amount-field" name="order_total" class="form-control" readonly value="Tk. {{number_format($order->order_total)}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="payment-field" class="form-label">Payment Method</label>
                                                    <input type="text"  style="background-color: #D3D3D3" id="payment-field"  class="form-control" readonly value="{{$order->payment_type == 1 ? 'Cash On Delivery' : 'Online'}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row  gy-4 mb-3">
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="amount-field" class="form-label">Payment Amount (in TK.) </label><i class="mdi mdi-lead-pencil"></i>
                                                    <input type="text" id="amount-field" class="form-control" value="{{$order->order_total}}" name="payment_amount" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div>
                                                    <label for="payment-status" class="form-label">Payment Status  </label><i class="mdi mdi-lead-pencil"></i>
                                                    <select class="form-control" data-trigger name="payment_status" id="payment-status" required>
                                                        <option value="" disabled selected> -- Select Payment Status -- </option>
                                                        <option value="Pending" {{$order->order_status == 'Pending' ? 'selected' : ''}}> Pending </option>
                                                        <option value="Processing" {{$order->order_status == 'Processing' ? 'selected' : ''}}> Processing </option>
                                                        <option value="Complete" {{$order->order_status == 'Complete' ? 'selected' : ''}}> Complete </option>
                                                        <option value="Cancel" {{$order->order_status == 'Cancel' ? 'selected' : ''}}> Cancel </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="delivered-status" class="form-label">Delivery Status </label><i class="mdi mdi-lead-pencil"></i>
                                            <select class="form-control" data-trigger name="order_status" id="delivered-status" required >
                                                <option value="" disabled selected> -- Select Delivery Status -- </option>
                                                <option value="Pending" {{$order->order_status == 'Pending' ? 'selected' : ''}}> Pending </option>
                                                <option value="Processing" {{$order->order_status == 'Processing' ? 'selected' : ''}}> Processing </option>
                                                <option value="Complete" {{$order->order_status == 'Complete' ? 'selected' : ''}}> Complete </option>
                                                <option value="Cancel" {{$order->order_status == 'Cancel' ? 'selected' : ''}}> Cancel </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-primary" id="edit-btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                    <div class="mt-4 text-center">
                                        <h4>You are about to delete a order ?</h4>
                                        <p class="text-muted fs-15 mb-4">Deleting your order will remove all of your information from our database.</p>
                                        <div class="hstack gap-2 justify-content-center remove">
                                            <button class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                            <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
