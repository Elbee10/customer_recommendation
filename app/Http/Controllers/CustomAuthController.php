<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Hash;
use Rule;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");
    }

    public function register_user(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'username'=>'required ',
            'password'=>'required | min:5',
            'repeat_password'=>'required ',
            'address'=>'required',
            'dob'=>'required'
        ]);

        $customer = new Customer();

        if (!$customer->where('email',$request->input('email'))->exists() && !$customer->where('username',$request->input('username'))->exists()) {
            # code...
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->username = $request->username;
            $customer->password = Hash::make($request->password);
            $customer->repeat_password = Hash::make($request->repeat_password);
            $customer->address = $request->address;
            $customer->dob = $request->dob;
            $result = $customer->save();
            
            if ($result) {
                return back()->with('success', 'Customer added succesfully');
                # code... 
            }else{
                $request->session()->flash();
                return back()->with('fail', 'Customer not added');
            }
        }else{
            return back()->with('fail', 'Email or username already taken')->withInput();
        }

            
      
       





    }
}
