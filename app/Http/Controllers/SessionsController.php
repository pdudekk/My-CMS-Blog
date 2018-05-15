<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class SessionsController extends Controller
{
    public function destroy(){

        auth()->logout();
        auth('admin')->logout();
        return redirect()->home();
    }

    public function create(){

        return view('sessions.create');

    }

    public function store(){

        //auth the



        if(auth()->attempt(request(['email', 'password']))){

            return redirect('/');
        }else{

            return back()->withErrors([
                'message' => 'Cos sie nie zgadza.'
            ]);

        }

    }


}
