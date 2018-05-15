<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function submit(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        // Create Message
            $message = new Message;
            $message->name = $request-> input('name');
            $message->email = $request-> input('email');
            $message->message = $request-> input('Message');

        //Save message
            $message->save();

        // Redirect

            return redirect('/')->with('success', 'Message sent');
    }

    public function getMessages(){

        $messages = Message::all(); //pobieranie z bazy danych

        return view('messages')->with('messages', $messages);

    }
}
