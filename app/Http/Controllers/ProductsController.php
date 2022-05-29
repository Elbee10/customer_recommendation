<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;

class ProductsController extends Controller
{
    public function productsDashboard(){
        $customer = new Customer();
        $data = array();

        if (Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId'))->first();

        }
        return view('dashboard.productsDashboard', compact('data'));
    }


}
