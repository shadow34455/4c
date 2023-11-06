<?php

namespace App\Http\Controllers;

use App\Models\messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public $message;
public function __construct(messages $message)
{
$this->message = $message;
}
    public function index()
    {
        $user = auth()->user()->username;
        $messages = messages::where('to', $user)->get();
        return view('messages.inbox',compact('messages'));
        // return view ('messages.index')->with('messages', $messages);
     //    $services = services::all();
        
    //    $messages = messages::all();
    //    return view ('messages.index')->with('messages', $messages);
    //    $messages = auth()->user()->messages;
    //    return view ('messages.index')->with('messages', $messages);
    }
    public function sent()
    {
        $user_id = auth()->user()->id;
        $messages = messages::where('user_id', $user_id)->get();
        return view('messages.Sent',compact('messages'));
        // return view ('messages.index')->with('messages', $messages);
     //    $services = services::all();
        
    //    $messages = messages::all();
    //    return view ('messages.index')->with('messages', $messages);
    //    $messages = auth()->user()->messages;
    //    return view ('messages.index')->with('messages', $messages);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function NewMessage()
    {
        return view('messages.NewMessage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = request()->validate([
        //     'Subject' => 'string',
        //     'body' => 'string',
        //     'too' => 'string',
             
        // ]);
        // $user_id=auth()->user()->id;
        //    auth()->User()->messages()->create([
        //    'Subject' => $data['Subject'],
        //    'body' => $data['body'],
        //    'too' => $data['too'],
        //    'user_id' => $user_id,
        // ]);

        // return back();

        $request->User()->messages()->create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(messages $message)
    {
;
$message = $this->message->find($message);
return view('livewier.massages',compact('message'));
        
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(messages $messages)
    {
        //
    }
}
