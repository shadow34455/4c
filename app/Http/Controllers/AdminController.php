<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\admin;
use App\Models\public_services;
use App\Models\question;
use App\Models\services;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number_of_users = User::count();
        $number_of_services = services::count() + public_services::count();
        $number_of_questions = question::count();

        return view('admin.index', compact('number_of_users', 'number_of_services', 'number_of_questions'));
    }
    public function creatadmin()
    {
        return view('admin.createAdmin');
    }
    public function newadmin(Request $request)
    {
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'role' =>$request->role,
            'password' => Hash::make($request->password),
        ]);
        return back();
    }
    public function send_messages()
    {
        $users = User::all();
       
        return view('admin.send_messages', compact('users'));
    }

    public function send_messages_all()
    {   
        foreach(User::all() as $user){
if(auth()->user()->username != $user->username){
           $data = request()->validate([
            'Subject' => 'string',
            'body' => 'string',    
           ]);
           $user_id=auth()->user()->id;
           auth()->User()->messages()->create([
           'Subject' => $data['Subject'],
           'body' => $data['body'],
           'to' => $user->username,
           'user_id' => $user_id,
        ]);
    }
    }
    session()->flash('flash_message', 'Send message successfully');

        return back();
    }
    public function send_messages_Customer(Request $request)
    {
        foreach($user = User::where('role', 2)->get() as $user){


           $data = request()->validate([
            'Subject' => 'string',
            'body' => 'string',    
           ]);
           $user_id=auth()->user()->id;
           auth()->User()->messages()->create([
           'Subject' => $data['Subject'],
           'body' => $data['body'],
           'to' => $user->username,
           'user_id' => $user_id,
        ]);
    }
    session()->flash('flash_message', 'Send message successfully');

        return back();
    }

    public function send_messages_Competito(Request $request)
    {
        foreach($user = User::where('role',3)->get() as $user){


           $data = request()->validate([
            'Subject' => 'string',
            'body' => 'string',    
           ]);
           $user_id=auth()->user()->id;
           auth()->User()->messages()->create([
           'Subject' => $data['Subject'],
           'body' => $data['body'],
           'to' => $user->username,
           'user_id' => $user_id,
        ]);
    }
    session()->flash('flash_message', 'Send message successfully');

        return back();
    }
    public function send_messages_admin(Request $request)
    {
        foreach($user = User::where('role',1)->get() as $user){
           $data = request()->validate([
            'Subject' => 'string',
            'body' => 'string',    
           ]);
           $user_id=auth()->user()->id;
           auth()->User()->messages()->create([
           'Subject' => $data['Subject'],
           'body' => $data['body'],
           'to' => $user->username,
           'user_id' => $user_id,
           
        ]);
        session()->flash('flash_message', 'Send message successfully');
  
    }
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
