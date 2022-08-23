<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class AdminOrderController extends Controller
{

    private $orders;
    private $order;

    public function index()
    {
        $this->orders = Order::orderBy('id', 'desc')->get();
        return view('admin.order.manage', ['orders' => $this->orders]);
    }

    public function detail($id)
    {
        $this->order = Order::find($id);
        return view('admin.order.detail', ['order' => $this->order]);
    }

    public function invoice($id)
    {
        $this->order = Order::find($id);
        return view('admin.order.invoice', ['order' => $this->order]);
    }

    public function downloadInvoice($id)
    {

        $pdf = PDF::loadView('admin.order.download-invoice', ['order' => Order::find($id)]);
        return $pdf->download('invoice#BT000'.$id.'.pdf');
    }

    public function delete($id)
    {

    }


}
