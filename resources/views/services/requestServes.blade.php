<x-app-layout>
<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->

<div class="mt-4 ">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
         
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="/create/serves" method="POST" enctype="multipart/form-data">
          @csrf 
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700"> competitor </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    
                    <input type="text" name="competitor_username" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" value="{{$post->username}}" required>
                    <input  type="text" name="competitor_id" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 visibility: hidden" value="{{$post->id}}" required>
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
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700"> price </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    
                    <input type="text" name="price" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="" required>
                  </div>
                </div>
              </div>
              <div class="mt-4">
                <x-jet-label for="date" value="{{ __('dead_line') }}" />
               <?php $mytime = Carbon\Carbon::now()->format('Y-m-d'); ?>
                <x-jet-input id="date" class="block mt-1 w-full" type="date" min={{$mytime}} name="dead_line" :value="old('date')" required />
            </div>
              <div>
                <label for="about" class="block text-sm font-medium text-gray-700"> description </label>
                <div class="mt-1">
                  <textarea id="about" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="description" required></textarea>
                </div>
              </div>
              
      

              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload file</label>
              <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" name="Attachments" id="user_avatar" type="file" required>
              
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