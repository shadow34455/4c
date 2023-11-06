<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $services=null;
    public function index()
    {
        
           // $messages = messages::all();
           // return view ('messages.index')->with('messages', $messages);
           $user = auth()->user()->id;
           $services = services::where('competitor_id', $user)->get();
        //    $services = services::all();
           return view ('services.index')->with('services', $services);

        //    $services = auth()->user()->services;
        //    return view ('services.index')->with('services', $services);
        
    }
    public function reqindex()
    {
        
           // $messages = messages::all();
           // return view ('messages.index')->with('messages', $messages);
           $user = auth()->user()->id;
           $services = services::where('user_id', $user)->get();
        //    $services = services::all();
           return view ('services.reqindex')->with('services', $services);

        //    $services = auth()->user()->services;
        //    return view ('services.index')->with('services', $services);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pro)
    {
        $post = User::find($pro);
        return view('services.requestServes',compact('post'));
        // return view('services.requestServes',['pro' => $post]);

    }
    public function newcreate()
    {
        
        return view('services.requestServes',compact('post'));
        // return view('services.requestServes',['pro' => $post]);

    }
    // public function approve(services $services)
    // {
    //     $services->stat = 1;
    //     $services->save();
    //     session()->flash('flash_message', 'your approved the servies');
    //     return redirect(route('user.blocked'));
    // }
    // public function Refusal(services $services)
    // {
    //     $services->stat = 2;
    //     $services->save();
    //     session()->flash('flash_message', 'your Refusal the servies');
    //     return redirect(route('user.blocked'));
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    
    public function Acceptance(Request $request ,services $id)
    {
        $id->status = 1;
        $id->save();

        return redirect(route('services.index'));
    }
     public function pay(Request $request ,services $id)
    {
        $id->status = 2;
        $id->save();

        return back();
    }
    public function Refusal(Request $request ,services $id)
    {
        $id->status = 4;
        $id->save();

        return redirect(route('services.index'));
    }
   
    public function requestServes(Request $request ,User $id)
    {

    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'Subject' => 'string',
            'description' => 'string',
            'competitor_id' => 'string',
            'competitor_username' => 'string',
            'price' => 'integer',
            
            'dead_line' => 'date',
            'user_id'=> 'string',
             
        ]);
        $user_id=auth()->user()->id;
        $Attachments = request('Attachments')->store('Services-Attachments', 'public');

           auth()->User()->Services()->create([
           'Subject' => $data['Subject'],
           'description' => $data['description'],
           'competitor_id' => $data['competitor_id'],
           'competitor_username' => $data['competitor_username'],
           'user_id' => $data['user_id'],
           'price' => $data['price'],
           'Attachments'=>  $Attachments,
           'dead_line' => $data['dead_line'],
        ]);

        return back();

        // $request->User()->Services()->create($request->all());
        // return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = services::find($id);
         
         return view('services.showserves',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(services $services)
    {
        //
    }
}
