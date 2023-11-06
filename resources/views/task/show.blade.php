<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
{{-- <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet"> --}}

<x-app-layout>

<div class="col-md-8 bg-white "style="width:800px; margin:0 auto;" >

    <h1 class="text-gray-800 text-3xl font-semibold" style="margin: 25px;">{{$tasks->title}}</h1>
    <span class="md:break-before-column">
       {!!$tasks->body!!}
      </span>
        
       

      @if (auth()->user()->block)
      <div class="alert alert-danger" role="alert">
        you are banned
      </div>
  @else
  @can('Competitor')
      <div class="col-md-8 bg-white"style="width:800px; margin:0 auto;">
        <div class="col-lg-11 col-md-6 col-xs-11">
        <h3 style="margin: 25px;"> post : </h3>
            <form action="/create" id="comments" method="post" style="margin: 25px;" enctype="multipart/form-data"  >
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name= "body"  id="content"  ></textarea>
                </div>
                
                {{-- <button type="submit" class="btn btn-primary">submit</button> --}}
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold mt-5 py-2 px-4 rounded">
                    submit
                  </button>
                <input type="hidden" name="tasks_id" value="{{$tasks->id}}">
            </form>
        </div>
    </div>
    @endcan
    @endif
 
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>   
    <script>
      ClassicEditor
          .create( document.querySelector( '#content' ), {
              ckfinder: {
                  uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}'
              }
          },{
              alignment: {
                  options: [ 'right', 'right' ]
              }} )
          .then( editor => {
              console.log( editor );
          })
          .catch( error => {
              console.error( error );
          })

  </script>
  

    
    @foreach($tasks->posts as $post)
    @if($post->approved==true)
    <div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4">
        <a  href="/user/{{$post->user->username}}" class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">
             <div class="flex items-center">
                <img class="hidden object-cover w-10 h-10 mx-1 rounded-full sm:block" src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->username }}">
               {{$post->user->username}}
            </div></a>
        <div class="mt-2">
            <p class="mt-2 text-gray-600 dark:text-gray-300">{!!$post->body!!}</p>
        </div>
        
        <div class="flex items-center justify-between mt-4">
            @livewire('like-button', ['post_id' => $post->id], key($post->id))

            <div class="flex items-center justify-between">
            <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
        </div>
        </div>
    </div>

@endif
    @endforeach
  
</x-app-layout>

