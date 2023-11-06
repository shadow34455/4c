  <x-app-layout>
        <section class="bg-white dark:bg-gray-900">
          <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
              <input type="search"class="form-control  block  w-full  px-3  py-1.5  text-base  font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out  mt-4  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "  id="exampleSearch" placeholder="Type query" />
            </div>
          </div>
@foreach($public_services as $services)

<div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4">
    <a  href="/user/{{$services->user->username}}" class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">
         <div class="flex items-center">
            <img class="hidden object-cover w-10 h-10 mx-1 rounded-full sm:block" src="{{ $services->user->profile_photo_url }}" alt="{{ $services->user->username }}">
           {{$services->user->username}}
        </div></a>
    <div class="mt-2">
        <p class="mt-2 text-gray-600 dark:text-gray-300">{{$services->description}}</p>
    </div>
    
    <div class="flex items-center justify-between mt-4">
      

        <div class="flex items-center justify-between">
        <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{ $services->created_at->diffForHumans() }}</span>
          <form method="POST" action="{{ route('public_servies.bid',$services->id) }}">
            @csrf
            <x-jet-button class="ml-4">
              {{ __('bid') }}
          </x-jet-button>
          </form>
      </div>
    </div>
</div>
@endforeach
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