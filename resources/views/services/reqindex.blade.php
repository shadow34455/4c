
<x-app-layout>
     <a href="{{ route('publicservices.create') }}">
        <button class="bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
          serves
        </button></a>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" id="dataTable">
        <tr>
        <th scope="col" class="px-6 py-3">
        competitor
        </th>
        <th scope="col" class="px-6 py-3">
        Subject
        </th>
        {{-- <th scope="col" class="px-6 py-3">
        description
        </th> --}}
        <th scope="col" class="px-6 py-3">
        Price
        </th>
        <th scope="col" class="px-6 py-3">
            dead_line
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">status</span>
               </th>  
        <th scope="col" class="px-6 py-3">
         <span class="sr-only">show</span>
        </th>
        
        </tr>
        </thead>
    
        <tbody>
            @forelse ($services as $service)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
            {{ $service->competitor_username }}
        </th>
        <td class="px-6 py-4">
            {{ $service->Subject }}
        </td>
        {{-- <td class="px-6 py-4 truncate">
            <p class=" text-ellipsis overflow-hidden ..."> {{ $service->description}}</p>
        </td> --}}
        <td class="px-6 py-4">
        {{ $service->price}}
        </td>
        <td class="px-6 py-4">
            {{ $service->dead_line}}
        </td>
        <td class="px-6 py-4">

           @if( $service->status == 0) 
           <i class="fa-regular fa-circle-pause"></i>
           @endif
           @if( $service->status == 1) 
           <i class="fa-brands fa-cc-paypal"></i>
           @endif
           @if( $service->status == 2) 
           <i class="fa-regular fa-clock" ></i>
           @endif
           @if( $service->status == 3) 
           <i class="fa-regular fa-clock" ></i>
           @endif
           @if( $service->status == 4) 
           <i class="fa-solid fa-circle-xmark"></i>
           @endif
        </td>
        <td class="px-6 py-4 text-right">
        <a href="{{ route('show.serves',$service->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
        </td>
        </tr>
        @empty
        <div class="max-w-lg mx-auto">
            <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div>
                    <span class="font-medium">Info alert!</span> no serves
                </div>
            </div>
            
        @endforelse
        </tbody>
        </table>
     
        </div>
        <div mt-4>
       
        </div>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable();
    
            });
        </script>
    </x-app-layout>