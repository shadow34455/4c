{{-- <x-app-layout>
    <div class="flex mb-4">
        <div class="w-1/4 ">
            <div class="w-60 h-full shadow-md bg-white px-1 absolute">
               <a href={{route('messages.NewMessage')}}> <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center mt-4 ml-3">
                    <i class="fa-solid fa-plus"></i>
                    <span>New Message</span>
                  </button></a>
              <ul class="relative">
                <li class="relative">
                  <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href={{route('messages.index',Auth::user()->username)}} data-mdb-ripple="true" data-mdb-ripple-color="dark"><i class="fa-solid fa-inbox"></i> <p>inbox</p></a>
                </li>
                <li class="relative">
                  <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href={{route('messages.sent',Auth::user()->username)}} data-mdb-ripple="true" data-mdb-ripple-color="dark"><i class="fa-regular fa-paper-plane"></i>Sent</a>
                </li>
                <li class="relative">
                  <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="dark"><i class="fa-solid fa-trash"></i>trash</a>
                </li>
              </ul>
            </div>
        </div>
        <div class="w-3/4  "style="position:relative; width:100%; height:100%; overflow-y:auto ;margin-left:16rem">
        
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" id="dataTable">
                    <tr>
                    <th scope="col" class="px-6 py-3">
                    Sender
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Subject
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dlete
                        </th>
                        
                    </tr>
                    </thead>
                
                    <tbody>
                        @forelse ($messages as $message)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $message->user->username }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $message->Subject }}
                    </td>
               
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                    </tr>
                    @empty
                    <div class="max-w-lg mx-auto " >
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
      </div>
    </x-app-layout> --}}

<x-app-layout>
 <div class="flex">
<div class="w-60 h-full shadow-md bg-white px-1 absolute">
  <a href={{route('messages.NewMessage')}}> <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center mt-4 ml-3">
    <i class="fa-solid fa-plus"></i>
    <span>New Message</span>
  </button></a>
  <ul class="relative">
    <li class="relative">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="{{route('messages.index',Auth::user()->username)}}" data-mdb-ripple="true" data-mdb-ripple-color="dark"><i class="fa-solid fa-inbox"></i> <p>inbox</p></a>
    </li>
    <li class="relative">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="{{route('messages.sent',Auth::user()->username)}}" data-mdb-ripple="true" data-mdb-ripple-color="dark"><i class="fa-regular fa-paper-plane"></i>Sent</a>
    </li>
    <li class="relative">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="dark"><i class="fa-solid fa-trash"></i>trash</a>
    </li>
  </ul>
</div>
  
  <div id="main-content" style="position:relative; width:100%; height:100%; overflow-y:auto ;margin-left:16rem " class="      ">
    <main>
    <div class="flex abslute overflow-x-auto shadow-md sm:rounded-lg mt-4">
 
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" id="dataTable">
        <tr>
        <th scope="col" class="px-6 py-3">
        Sender
        </th>
        <th scope="col" class="px-6 py-3">
        Subject
        </th>
        <th scope="col" class="px-6 py-3">
            Dlete
            </th>
            
        </tr>
        </thead>
    
        <tbody>
            @forelse ($messages as $message)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
            {{ $message->user->username }}
        </td>
        <td class="px-6 py-4">
            {{ $message->Subject }}
        </td>
   
        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-regular fa-trash-can"></i></a>
        </td>
        </tr>
        @empty
        <div class="max-w-lg mx-auto " >
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
    </div>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable();
    
            });
        </script>
    

</x-app-layout>