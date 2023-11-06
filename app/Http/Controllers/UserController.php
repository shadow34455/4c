<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\question;
use App\Models\answer;
use App\Models\posts;
use App\Models\public_services;
use App\Models\services;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $users = User::where('username','LIKE','%'.$request->keyword.'%')->paginate(10);

        return view('User',compact('users'));
    }

     public function bid($servic){
        $user=new user;
    
        $user->public_services_bid()->attach($servic);
   
 return back();
     }
    public function statistics()
    {
        $user = auth()->user()->id;
        $number_of_questions = question::where('user_id',$user)->count();
        $number_of_answer = answer::where('user_id',$user)->count();
        $number_of_services_requests = services::where('user_id',$user)->count() + public_services::where('user_id',$user)->count();
        $number_of_services_accepted= services::where('user_id',$user)->count() + public_services::where('Personal_account_id',$user)->count();
        

        return view('profile', compact('number_of_questions', 'number_of_answer', 'number_of_services_requests','number_of_services_accepted'));


    }
    public function index()
    {
        $users = User::paginate(12);
       
        return view('Users', compact('users'));
    }
    public function userstable()
    {
        $users = User::all();
       
        return view('admin.users', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function adminUpdate(Request $request, User $user)
    {
        $user->role = $request->role;
        $user->save();
        
        session()->flash('flash_message', 'The users permissions have been modified successfully');

        return redirect(route('admin.users'));
    }
    public function create()
    {
        //
    }
    public function adminDestroy(User $user)
    {
        $user->delete();

        session()->flash('flash_message', 'The user has been deleted successfully');

        return redirect(route('admin.users'));
    }
    public function adminBlock(Request $request, User $user)
    {
        $user->block = 1;
        $user->save();
        
        session()->flash('flash_message', 'The user has been blocked successfully');

        return redirect(route('admin.users'));
    }

    public function blockedUsers()
    {
        $user = User::where('block', 1)->get();
        return view('admin.blocked', compact('user'));
    }

    public function openBlock(Request $request, User $user)
    {
        $user->block = 0;
        $user->save();
        session()->flash('flash_message', 'The user has been successfully unblocked');
        return redirect(route('user.blocked'));
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
        //
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
