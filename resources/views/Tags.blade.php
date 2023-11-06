<x-app-layout>
  <section class="bg-white dark:bg-gray-900">
    <div class="flex justify-center">
      <div class="mb-3 xl:w-96">
        <input type="search"class="form-control  block  w-full  px-3  py-1.5  text-base  font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out  mt-4  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "  id="exampleSearch" placeholder="search" />
      </div>
    </div>
 
   <!-- component -->
<div class=" mx-auto lg:max-w-7xl mt-3 ">
	<div class="max-w-7xl mx-auto px-5 mb-3">
		<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8 md-4">

      @foreach($tags as $tag)
			<div class="max-w-xl bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
					<div class="p-5">
						<div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">{{$tag->name}}</div>
						<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{\Illuminate\Support\Str::limit($tag->description,60)}}</p>	
					</div>
		</div>
@endforeach


	</div>
  <div>
    {{$tags->render()}}
       </div>
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
