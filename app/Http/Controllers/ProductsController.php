<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;
use App\Products;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    public function order(){
        return view('dashboard.order');
    }

    public function addProducts(){
        return view('auth.adminAuthAdd');
    }
    public function productsDashboard(){
        $customer = new Customer();
        $data = array();

        if (Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId'))->first();
            $products = Products::all();

        }
        return view('dashboard.productsDashboard', compact('data', 'products'));
    }

    public function productCategory(){
        $products = Products::all();
        return view('dashboard.productCategories', compact( 'products'));
    }
   
    

    public function addProductsAdmin(Request $request){
        $request->validate([
            'name' =>'required',
            'image'=>'required',

        ]);
        $prod = new Products(); 
        $prod->name = $request->name;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $prod->image = $filename;

        }
        $res = $prod->save();
        if ($res) {
            return back()->with('success','Product added successfully');
        }else{
            return back()->with('fail','Failed to add Product');
        }
       
    }
 

    //public function place_order(Request $request){
       // $request->validate([]);}

 


}
