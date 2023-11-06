<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //  public $posts;
    // public function __construct(posts $posts)
    // {
    // $this->posts = $posts;
    // }
   
    public function index()
    {
        // $posts = $this->posts::with('user','fields')->paginate(10);

        $posts = posts::all();
        return view('admin.posts', compact('posts'));
        // $posts = posts::all();
        // return view ('admin.posts')->with('posts', $posts);
        //  $posts = $this->posts::with('user:id,name')->paginate(10);
        // $posts =  "posts::all()";
        // return view('index',compact('posts'));
        // $posts = $this->post::with('user','category')->paginate(10);
        // return view('admin.posts.all', compact('posts'));

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
        $request->User()->posts()->create($request->all());
        return back();
         //dd($request->all());
    }
    public function upload_image_cke(Request $request){
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
    
            $request->file('upload')->move(public_path('media'), $fileName);
    
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
            
    
        }
    }
    // public function uplodimage(Request $request)
    // {
    //    if($request->hasFile('uplod')){
    //        $originName=$request->file('uplod')->getClientOriginalName();
    //        $fileName=pathinfo($originName,PATHINFO_FILENAME);
    //        $extension =$request->file('uplod')->getClientOriginalExtension();
    //        $fileName= $fileName . '_' . time() . '.' .  $extension;
    //        $request->file('uplod')->move(public_path('midia'), $fileName);
    //        $url=asset('media/'.$fileName);
    //        return response()->json(['fileName' =>$fileName ,'uploaded'=>1,'url'=> $url]);
    //    }
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(posts $posts)
    {
        if($posts == null)
        {
            abort(404);
        }
        
        return view('task.show',['post' => $posts]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = posts::find($id);

        return view('admin.edit_posts',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posts $posts,$id)
    {
        $request->user()->posts()->find($id)->update($request->approved);
        session()->flash('flash_message', 'The post has been update successfully');
        return redirect(route('admin.edit_posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $posts)
    {
        $posts->delete();

        session()->flash('flash_message', 'The post has been deleted successfully');

        return redirect(route('admin.posts'));
    }
}
