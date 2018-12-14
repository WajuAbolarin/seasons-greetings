<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageConfirmationController extends Controller
{


    public function create( $_, $id)
    {
        if(is_null($message = session('message')) ){
            $message = Message::findOrFail($id);

            if( is_null($message)){
                return  redirect()->route('home');
            }
        }

        return view('messaging.confirmation', compact('message'));
    }

    public function store(Request $request)
    {

        ($message = Message::findOrFail($request->message_id))
            ->update(['confirmed' => true]);

        return redirect()
            ->route('home')
            ->with('status', 'Your Greetings have been have been sent');
    }
}
