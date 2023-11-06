<x-app-layout>
    <div class="flex ">
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
            <div class="md:grid md:grid-cols-3 md:gap-6">
              <div class="mt-5 md:mt-0 md:col-span-2">
                <form action={{route('store.NewMessage')}} method="POST" enctype="multipart/form-data">
                  @csrf 
                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
        
                      <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                          <label for="company-website" class="block text-sm font-medium text-gray-700"> to </label>
                          <div class="mt-1 flex rounded-md shadow-sm">
                            
                            <input type="text" name="to" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" value="" required>
                            <input  type="text" name="user_id" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 visibility: hidden" value="{{Auth::user()->id}}" required>
                          </div>
                        </div>
                      </div>
        
                      <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                          <label for="company-website" class="block text-sm font-medium text-gray-700"> Subject </label>
                          <div class="mt-1 flex rounded-md shadow-sm">
                            
                            <input type="text" name="Subject" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="" required>
                          </div>
                        </div>
                        
                      </div>
                      <div class="grid grid-cols-3 gap-6">
                      </div>
                      <div>
                        <label for="about" class="block text-sm font-medium text-gray-700"> Body </label>
                        <div class="mt-1">
                          <textarea id="about" name="body" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="description" required></textarea>
                        </div>
                      </div>
                      
              
    
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                      <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
          <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
              <div class="border-t border-gray-200"></div>
            </div>
          </div>
          
</x-app-layout>