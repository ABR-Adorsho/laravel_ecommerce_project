<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Session;

class CustomerAuthController extends Controller
{

    public $customer;

    public function myAccount()
    {
        return view('customer.auth.customer-account');
    }

    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('mobile', $request->mobile)->first();
        if ($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/customer-dashboard');
            }
            else
            {
                return redirect()->back()->with('message', 'Your Password is invalid!');
            }
        }
        else
        {
            return redirect()->back()->with('message', 'Your mobile number is invalid!');
        }
    }

    public function register(Request $request)
    {
        $this->customer = new Customer();
        $this->customer->name       = $request->name;
        $this->customer->email      = $request->email;
        $this->customer->password   = bcrypt($request->password);
        $this->customer->mobile     = $request->mobile;
        $this->customer->save();

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('/customer-dashboard')->with('message', 'Welcome to your Dashboard');
    }


    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }

}
