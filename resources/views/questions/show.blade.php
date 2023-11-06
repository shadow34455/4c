<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
<div class="col-md-8 bg-white "style="width:800px; margin:0 auto;" >

    <h1 class="text-gray-800 text-3xl font-semibold" style="margin: 25px;">{{$questions->title}}</h1>
    <span class="md:break-before-column">
       {!!$questions->body!!}
      </span>
      @if (auth()->user()->block)
      <div class="alert alert-danger" role="alert">
        you are banned
      </div>
  @else
  @can('personal account')
      <div class="col-md-8 bg-white"style="width:800px; margin:0 auto;">
        <div class="col-lg-11 col-md-6 col-xs-11">
        <h3 style="margin: 25px;"> post : </h3>
            <form action="/create/post" id="comments" method="post" style="margin: 25px;" enctype="multipart/form-data"  >
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name= "body"  id="content"  ></textarea>
                </div>
                
                {{-- <button type="submit" class="btn btn-primary">submit</button> --}}

                <input type="hidden" name="question_id" value="{{$questions->id}}">

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold mt-5 py-2 px-4 rounded">
                    submit
                  </button>
            </form>
        </div>
    </div>
    @endcan
    @endif
 
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>   
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
   --}}

    
    @foreach($questions->posts as $post)
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
</div>
@endif
    @endforeach
    </section >
    <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
              <div class="text-sm text-blueGray-500 font-semibold py-1">
                {{-- Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>. --}}
                  <span>Copyright &copy; 4Competitions 2022</span>
              </div>
            </div>
          </div>
        </div>
      </footer>
</x-app-layout>
