<?php

namespace App\Http\Controllers;
use App\Models\question;
use App\Models\tag;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $question;
    public function __construct(question $question)
    {
    $this->question = $question;
    }
    public function index()
    {
        
        $questions = question::paginate(9);
        return view('questions.index', compact('questions'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = tag::all();
        return view('questions.ask a question', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;
        // $request->User()->question()->create($request->all());
        $question=new question;
        $question->user_id= $user;
        $question->title=$request->title;
        $question->slug=" ";
        $question->body=$request->body;
        $question->save();
        $tag = explode(",", $request->tags);
        $tag = str_replace( array( '\'', '"',
         ',' , 'value',';', '<', '>' ,'[',']','{','}',':',' '), ' ',$tag);
    
         foreach ($tag as $tg) {
           
            $tg=trim($tg);
            $tgid =tag::where('name', $tg)->get('id');
            $tgid  = explode(",", $tgid);
            $tgid = str_replace( array( '\'', '"',
            ',' , 'id',';', '<', '>' ,'[',']','{','}',':',' '), ' ',$tgid);
          $question->tag()->attach($tgid);
         }

        

        // $tags  = $request->tg;
        
        

       
    
        // $user_id=auth()->user()->id;
        // foreach ($tag as $tg) {
        //     auth()->User()->messages()->create([
        //     'tags_id' => $tag,
        //     'questions_id' => $user_id,
        //  ]);
        //   }
        return back();
    }
    // public function upload_image_cke(Request $request){
    //     if ($request->hasFile('upload')) {
    //         $originName = $request->file('upload')->getClientOriginalName();
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         $extension = $request->file('upload')->getClientOriginalExtension();
    //         $fileName = $fileName . '_' . time() . '.' . $extension;
    
    //         $request->file('upload')->move(public_path('media'), $fileName);
    
    //         $url = asset('media/' . $fileName);
    //         return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
            
    
    //     }
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = $this->question->find($id);
        return view('questions.show',compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        //
    }
}
