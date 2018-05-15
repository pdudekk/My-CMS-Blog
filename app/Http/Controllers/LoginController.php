<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){

        $username = $request->input('login');
        $password = $request->input('password');


        return redirect('/')->with('Success', 'Message sent');

    }
}
