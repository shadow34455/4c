<?php

namespace App\Http\Controllers;
use App\Events\NewNotification;
use App\Models\tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $tasks;
    public function __construct(tasks $tasks)
    {
    $this->tasks = $tasks;
    }
    public function index()
    {
    //return view('main', ['tasks' => tasks::latest()->get()]);
    return view('main', ['tasks' => $this->tasks::with('user:id,name')->whereApproved(true)->latest()->paginate(10)]);
    }

    public function getByfields($id)

    {
    $tasks = $this->tasks::with('user:id,name')->wherefield_id($id)->whereApproved(true)->latest()->paginate(10);
    return view('main',compact('tasks'));
    
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
        $request->user()->tasks()->create($request->all());

        $data =[
            'user_id' => "admin",
            'user_name'  => "admin",
            'comment' => "admin",
            'post_id' =>"admin" ,
       ];

        ///   save  notify in database table ////

      event(new NewNotification($data));

        return back();
        // $request->tasks()->create($request->all());
        // return back();
        // $data = request()->validate([
        //     'title' => 'string',
        //     'body' => 'string',
        //     'slug' => 'string',
        //     'admin_id'=>'string',
        //     'field_id'=>'string',
        //     'approved'=>'string',
        // ]);
        // $request->posts()->create($request->all());
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = $this->tasks->find($id);
        return view('task.show',compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(tasks $tasks)
    {
        //
    }

}
