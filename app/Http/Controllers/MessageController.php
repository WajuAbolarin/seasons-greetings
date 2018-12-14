<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('messaging.create')->with('active', 'messages');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the message
        $validedata = $request->validate([
            'sender_id' => 'required|max:11',
            'recipients' => 'required|array of phone numbers'
        ]);


        //check users Account balance and what it will cost to send the message


        //create the message record
        $message = Message::create([
            'sender'        => $request->user()->id,
            'sender_id'     => $request->sender_id,
            'message_body'  => $request->message_body,
            'recipients'    => join($request->recipients, ','),
            'schedule_time' => Carbon::parse($request->schedule_time)->toDateTimeString(),
        ]);


        //show the review page for the user to confirm sending the message. (cost breakdown, message, avialable credits)

        return redirect()->route('message.confirm' , $request->user()->id)->with('message', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
