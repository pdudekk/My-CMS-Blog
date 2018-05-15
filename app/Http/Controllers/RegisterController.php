<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function create(){

        return view('registration.create');

    }

    public function store(Request $request){

        //validacja
        $this->validate(request(),[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required | confirmed'
        ]);

        //create and save user


        $user = new User;

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));


        $user->save();
        //sign them in

        auth()->login($user);

        //redirect to home

        return redirect()->home();

    }

}
