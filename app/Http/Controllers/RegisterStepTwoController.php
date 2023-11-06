<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterStepTwoController extends Controller
{
   public function create()
   {
      return view('auth.register-step2');
      // return redirect(route('register-step2.create'));
   }

   public function store(Request $request){
      auth()->user()->update([  
      'username' => $request->username,
      'Job_title' => $request->Job_title,
      'education' => $request->education,
      'date' => $request->date,
      'gender' => $request->gender,
      'role' => $request->role,
      ]);
    return redirect()->route('dashboard');
   }
}
