<x-app-layout>
  <section class="bg-white dark:bg-gray-900">
    <div class="flex justify-center">
      <div class="mb-3 xl:w-96">
        <input type="search"class="form-control  block  w-full  px-3  py-1.5  text-base  font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out  mt-4  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "  id="exampleSearch" placeholder="search" />
      </div>
    </div>
    @can("personal account")
    <div class=" ml-4 ">
          <a href= {{ route('Question.create') }} >
            <button class=" ml-4 bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
              <i class="fa-solid fa-plus"></i>  question
            </button></a>
    </div>
    @endcan



    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
      <!--Card-->
      @foreach($questions as $question)
      <div class="rounded overflow-hidden shadow-lg bg-white">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2"> 
            <div class="flex items-center">
            <img class="hidden object-cover w-10 h-10 mx-1 rounded-full sm:block" src="{{ $question->user->profile_photo_url }}" alt="{{ $question->user->username }}">
           {{$question->user->name}}
           <div>
            <h1 class="text-sm font-light text-gray-600 dark:text-gray-400">@ {{ $question->user->username}}</h1>
           </div>
        </div>
        
      </div>
          <p class="break-all text-gray-700 text-base"> {{\Illuminate\Support\Str::limit($question->body,100)}} </p>
        </div>
        <!--Tags-->
        <div class="px-6 pt-4 pb-2">
          @foreach($question->tag as $tag)
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$tag->name}}</span>
          @endforeach
        </div>
        <div class="flex items-center justify-between" staile="direction: rtl;">
          <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{ $question->created_at->diffForHumans() }}</span>
      </div>
      <a href="{{ route('questions.show', $question->id) }}" class="text-xl font-medium text-indigo-500">more</a>
      </div>
    @endforeach
  
    </div>
    <div>
      {{$questions->render()}}
         </div>
        </section>
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