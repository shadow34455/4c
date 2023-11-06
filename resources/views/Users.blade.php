<x-app-layout>
  <section class="bg-white dark:bg-gray-900">
  
    <!-- component -->
<!-- This is an example component -->
<div class="flex items-center justify-center">
  <form method="POST"  action="{{ route('search.Users') }}">
    @csrf
  <div class="flex border-2 rounded">
    
      <input type="text" name="keyword" class="px-4 py-2 w-80" placeholder="Search...">
      <button class="flex items-center justify-center px-4 border-l">
          <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24">
              <path
                  d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
          </svg>
      </button>
   
  </div>
</form>
</div>
      <div class="container px-6 py-10 mx-auto">     
          <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">
            @foreach($users as $user)
             <a href="/user/{{ $user->username }}" > 
              <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-blue-600 rounded-xl">
                
                  {{-- <img class="{{ ->profile_photo_url }}" alt="{{->username }}"> --}}
                  <img alt="{{ $user->username }}" src="{{ $user->profile_photo_url }}" class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300">

                  <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white">{{ $user->name }}</h1>
                  
                  <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">@ {{ $user->username }}</p>
                  
                  <div class="flex mt-3 -mx-2">
                 
                  </div>
              </div>
            </a>
              @endforeach
            </div>
        </div>
        {{$users->render()}}
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
