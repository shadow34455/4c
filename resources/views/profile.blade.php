<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">

<x-app-layout>
   
        <head>

</head>
<body class=" h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7; ">

<main class="profile-page">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
          ">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
      <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </section>
  <section class="relative py-16 bg-blueGray-200">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative">
                <img alt="{{ $profile->username }}" src="{{ $profile->profile_photo_url }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px w-40 h-40 rounded-full">
              </div>
            </div>
            @if(auth()->check())
            @if(Auth::user()->username!=$profile->username && Auth::user()->role==3 && $profile->role==2)
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6 px-3 mt-32 sm:mt-0">
                <button  class="bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150 " data-bs-toggle="modal" data-bs-target="#message">
                  send massege
                </button>
                @if($profile->role!=0)
                <a href="{{ route('services.create',$profile->id) }}">
                <button class="bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                  serves
                </button></a>
                @endif
              </div>
            </div>
            @else
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6 px-3 mt-32 sm:mt-0">
             
              </div>
            </div>
            @endif
            @else
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6 px-3 mt-32 sm:mt-0">
             
              </div>
            </div>
            @endif
            @if($profile->role==3)
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
              <div class="flex justify-center py-4 lg:pt-4 pt-8">
                <div class="mr-4 p-3 text-center">                                             {{--        {{ $profile->answers->count() }} --}}
                  {{-- <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"></span>{{$number_of_services_requests}}<span class="text-sm text-blueGray-400">answers</span> --}}
                </div>
                {{-- <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"> 0</span><span class="text-sm text-blueGray-400">Lieks</span>
                </div> --}}
                <div class="lg:mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $number_of_services_requests }}</span><span class="text-sm text-blueGray-400">services_requests</span>
                </div>
              </div>
            </div>
            @endif
            @if($profile->role==2)
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
              <div class="flex justify-center py-4 lg:pt-4 pt-8">
                <div class="mr-4 p-3 text-center">                                             {{--        {{ $profile->answers->count() }} --}}
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$number_of_answer}}</span><span class="text-sm text-blueGray-400">answers</span>
                </div>
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">0</span><span class="text-sm text-blueGray-400">Lieks</span>
                </div>
                <div class="lg:mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $number_of_services_accepted }}</span><span class="text-sm text-blueGray-400">serves_accepted</span>
                </div>
              </div>
            </div>
            @endif
            
          </div>
          <div class="text-center mt-12">
            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
              {{ $profile->name }}
            </h3>
            <h5 class="text-1xl font-semibold leading-normal mb-2 text-blueGray-500 mb-2">
             <span> @</span> {{ $profile->username }}
            </h5>
            {{-- <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
              Los Angeles, California
            </div> --}}
            <div class="mb-2 text-blueGray-600 mt-10">
              <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>{{ $profile->Job_title }}
            </div>
            <div class="mb-2 text-blueGray-600">
              <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>{{ $profile->education }}
            </div>
          </div>
          @if($profile->role==2)
          <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
            <div class="flex items-center justify-center">
              <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
                <button type="button" class="rounded-l inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out">question</button>
                <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out">answers</button>
              </div>
            </div>
            <div class="flex flex-wrap justify-center">
              <div class="w-full lg:w-9/12 px-4">
                <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                  @forelse($profile->question as $question)
                  <div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4">
                    <a  href="/user/{{$question->user->username}}" class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">
                         <div class="flex items-center">
                            <img class="hidden object-cover w-10 h-10 mx-1 rounded-full sm:block" src="{{ $question->user->profile_photo_url }}" alt="{{ $question->user->username }}">
                           {{$question->user->username}}
                        </div></a>
                    <div class="mt-2">
                        <p class="mt-2 text-gray-600 dark:text-gray-300">{{\Illuminate\Support\Str::limit($question->body,100)}}</p>
                    </div>
                    
                    <div class="flex items-center justify-between mt-4">
                   
                    {{-- <div style="margin: 25px;"><h1>likes<h1>{{$question->likedByUsers->Count( )}}</div> --}}
                   
            
                        <div class="flex items-center justify-between">
                        <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{ $question->created_at->diffForHumans() }}</span>
                    </div>
                    </div>
                </div>
                  @empty
                  <div class="mx-auto col-8">
                      <div class="alert alert-primary text-center" role="alert">
                          No posts      
                      </div>
                  </div>
                  @endforelse
                </p>
                {{-- <a href="#pablo" class="font-normal text-pink-500">Show more</a> --}}
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
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
 
@if(auth()->check())

  {{-- massege --}}
     <!-- dialog -->
     <div id="message" class="modal fade" role="dialog" >
      <div class="modal-dialog">
          <!--  content-->
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">send massege</h5>
              </div>
              @if (auth()->user()->block)
              <div class="alert alert-danger" role="alert">
                you are banned
              </div>
          @else
              <div class="modal-body">
                  <div class="card-body p-3">
                      <!--Body-->
                      <form id="send" method="post" action="{{route('store.NewMessage')}}">
                          @csrf
                          <div class="form-group ">
                                  <input type="text" class="form-control" name="Subject" placeholder="subject">
                          </div>
                          <div class="form-group mt-4">
                                  <textarea class="form-control" name="body" placeholder="message "></textarea>
                          </div>
  
                          <input type="hidden" value={{ $profile->username }} class="form-control " name="to" >
  
                          <div class="text-center mt-4">
                              <button id="sendEmail" class="btn btn-primary btn-block ">Send</button>
                          </div>
                      </form>
                  </div>
                  <div id="msgs"></div>
              </div>
              @endif
              <div class="modal-footer">
                  <button  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
          <!-- end content -->
      </div>
  </div>

@endif
</div>
      
</x-app-layout>

