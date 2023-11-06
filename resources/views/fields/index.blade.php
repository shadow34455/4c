{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
<link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet"><link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    {{-- <x-slot name="header">
        <header>
           
        </header>
    </x-slot>
   
                    
                    
                   <div>
                      @foreach ($fields as $fi)  
                      <a class="dropdown-item" href="fields/{{ $fi->id }}/{{ $fi->slug }}">{{ $fi->title }}</a>
                        @endforeach 
                    
                  </div>
      
 --}}
 

 <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -m-4">
          @foreach ($fields as $fi)   
        <div class="p-4 md:w-1/4">
          <div class="h-full rounded-xl shadow-cla-blue bg-gradient-to-r from-indigo-50 to-blue-50 overflow-hidden">
            <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="storage/{{ $fi->imge_path }}" alt="blog">
            {{-- <img src="/storage/{{ $fi->image_path }}" class="w-full h-full object-cover"> --}}
            <div class="p-6">
              <h1 class="title-font text-lg font-medium text-gray-600 mb-4">{{ $fi->title }}</h1>
              <p class="leading-relaxed mb-4">{{ $fi->Description }}</p>
              <div class="flex items-center flex-wrap ">
           <a href="fields/{{ $fi->id }}/{{ $fi->slug }}"> <button class="bg-gradient-to-r from-cyan-400 to-blue-400 hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">more</button></a>
               
              </div>
            </div>
          </div>
        </div>   
         @endforeach  
      </div>
    </div>
  </section>

           
</x-app-layout>

