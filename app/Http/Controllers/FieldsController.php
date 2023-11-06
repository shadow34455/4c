<?php

namespace App\Http\Controllers;

use App\Models\fields;
use Illuminate\Http\Request;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $categories;
    
    // public function __construct(fields $fields)
    // {
    //     $this -> fields = $fields;
    // }   
    public function index()
    {
         $fields = fields::all();
         return view ('fields.index')->with('fields', $fields);
        // return $view->with('fields',$this->fields->all());
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



$data = request()->validate([
    'Description' => 'string',
    'slug' =>  'string',
    'title' =>  'string',
   // 'image_path' => ['required', 'image'],
]);
 $imagePath = request('imge_path')->store('fields-photos', 'public');

auth()->user()->fields()->create([
   'Description' => $data['Description'],
   'slug' => $data['slug'],
   'title' => $data['title'],
   'imge_path' => $imagePath ,
]);
return back();
//return redirect()->route('user_profile', ['username' => auth()->user()->username]);
// return view('applyFilters',['post_caption' => $data['post_caption'], 'image_path' => $imagePath ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fields  $fields
     * @return \Illuminate\Http\Response
     */
    public function show(fields $fields)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fields  $fields
     * @return \Illuminate\Http\Response
     */
    public function edit(fields $fields)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fields  $fields
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fields $fields)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fields  $fields
     * @return \Illuminate\Http\Response
     */
    public function destroy(fields $fields)
    {
        //
    }


}
