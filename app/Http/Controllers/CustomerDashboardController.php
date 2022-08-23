<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashboardController extends Controller
{

    private $orders;
    public function dashboard()
    {

       return view('customer.dashboard.home');
    }

    public function orders()
    {
        $this->orders = Order::where('customer_id', Session::get('customer_id'))->orderBy('id', 'desc')->simplePaginate(5);
        return view('customer.dashboard.order', ['orders' => $this->orders]);
    }
}
