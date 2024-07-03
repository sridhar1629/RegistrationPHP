<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Make sure you have a User model
use App\Models\Business;

class FormController 
{
    public function store(Request $request)
    {
        $request->validate([
            'firm_name' => 'required|email',
            'branch_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'postcode' => 'required',
        ]);
        $user = new User();
        $user->name = $request->firm_name;
        $user->role = $request->branch_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
  
        $business = new Business();
        $business->name = $request->firm_name;
        $business->industry = $request->branch_name;
        $business->location = $request->postcode;
        $business->user_id = $user->id;
        $business->save();


        return redirect('/')->with('success', 'Registration successful!');
    }
}

