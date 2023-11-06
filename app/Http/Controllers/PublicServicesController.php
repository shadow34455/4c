<?php

namespace App\Http\Controllers;

use App\Models\public_services;
use App\Models\tag;
use Illuminate\Http\Request;

class PublicServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $public_services = public_services::where('username','LIKE','%'.$request->keyword.'%')->paginate(10);

        return view('public_services',compact('public_services'));
    }
    public function index()
    {

        $public_services = public_services::all();
        return view('services.indexpublicserves', compact('public_services'));
;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = tag::all();
        return view('services.requestPublicServes', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $public_services=new public_services;
        // $data = request()->validate([
        //     'Subject' => 'string',
        //     'description' => 'string',
        //     'price' => 'integer',    
        //     'dead_line' => 'date',
        //     'user_id'=> 'string',
             
        // ]);
        // $user_id=auth()->user()->id;
         $Attachments = request('Attachments')->store('public-Services-Attachments', 'public');

        //    auth()->User()->public_services()->create([
        //    'Subject' => $data['Subject'],
        //    'description' => $data['description'],
        //    'user_id' => $data['user_id'],
        //    'price' => $data['price'],
        //    'Attachments'=>  $Attachments,
        //    'dead_line' => $data['dead_line'],
        // ]);
        $user = auth()->user()->id;
        $public_services->Subject=$request->Subject;
        $public_services->description=$request->description;
        $public_services->price=$request->price;
        $public_services->Attachments=$Attachments;
        $public_services->dead_line=$request->dead_line;
        $public_services->user_id=$user;
        $public_services->save();
        $tag = explode(",", $request->tags);
        $tag = str_replace( array( '\'', '"',
        ',' , 'value',';', '<', '>' ,'[',']','{','}',':',' '), ' ',$tag);
   
        foreach ($tag as $tg) {
          
           $tg=trim($tg);
           $tgid =tag::where('name', $tg)->get('id');
           $tgid  = explode(",", $tgid);
           $tgid = str_replace( array( '\'', '"',
           ',' , 'id',';', '<', '>' ,'[',']','{','}',':',' '), ' ',$tgid);
         $public_services->tag()->attach($tgid);
        }

        return back();

        // $request->User()->Services()->create($request->all());
        // return back();
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\public_services  $public_services
     * @return \Illuminate\Http\Response
     */
    public function show(public_services $public_services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\public_services  $public_services
     * @return \Illuminate\Http\Response
     */
    public function edit(public_services $public_services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\public_services  $public_services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, public_services $public_services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\public_services  $public_services
     * @return \Illuminate\Http\Response
     */
    public function destroy(public_services $public_services)
    {
        //
    }
}
