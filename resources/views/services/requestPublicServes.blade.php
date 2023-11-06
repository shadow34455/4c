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
        <form action="/create/publicserves" method="POST" enctype="multipart/form-data">
          @csrf 
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <div class="mt-1 flex rounded-md shadow-sm">
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
              
              <div>
                <label class="block text-sm font-medium text-gray-700"> Tags </label>
                <div class="mt-1">
                  <input name='tags'
                  class='some_class_name'            
                  placeholder='write some tags'      
                  value='' 
                  data-blacklist=''>  
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
  <?php 
  $add=" ";
 
  foreach($tag as $tagname){
   
    $add.=" ";
    $add.=$tagname->name;
  } 
$list=$add;
?>
    <script>
          <?php
echo "var jlist='$list';";
?>
      let text = jlist ;
      const myArray = text.split(" ");
      
      document.getElementById("demo").innerHTML = myArray; 
    
      </script>
 
          <style>
            .tagify{    
width: 100%;
max-width: 700px;
}
          </style>
<script>
var inputElm = document.querySelector('input[name=tags]'),
  whitelist =myArray;


// initialize Tagify on the above input node reference
var tagify = new Tagify(inputElm, {
  enforceWhitelist: true,

  // make an array from the initial input value
  whitelist: inputElm.value.trim().split(/\s*,\s*/) 
})

// Chainable event listeners
tagify.on('add', onAddTag)
    .on('remove', onRemoveTag)
    .on('input', onInput)
    .on('edit', onTagEdit)
    .on('invalid', onInvalidTag)
    .on('click', onTagClick)
    .on('focus', onTagifyFocusBlur)
    .on('blur', onTagifyFocusBlur)
    .on('dropdown:hide dropdown:show', e => console.log(e.type))
    .on('dropdown:select', onDropdownSelect)

var mockAjax = (function mockAjax(){
  var timeout;
  return function(duration){
      clearTimeout(timeout); // abort last request
      return new Promise(function(resolve, reject){
          timeout = setTimeout(resolve, duration || 700, whitelist)
      })
  }
})()

// tag added callback
function onAddTag(e){
  console.log("onAddTag: ", e.detail);
  console.log("original input value: ", inputElm.value)
  tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
}

// tag remvoed callback
function onRemoveTag(e){
  console.log("onRemoveTag:", e.detail, "tagify instance value:", tagify.value)
}

// on character(s) added/removed (user is typing/deleting)
function onInput(e){
  console.log("onInput: ", e.detail);
  tagify.settings.whitelist.length = 0; // reset current whitelist
  tagify.loading(true).dropdown.hide.call(tagify) // show the loader animation

  // get new whitelist from a delayed mocked request (Promise)
  mockAjax()
      .then(function(result){
          // replace tagify "whitelist" array values with new values
          // and add back the ones already choses as Tags
          tagify.settings.whitelist.push(...result, ...tagify.value)

          // render the suggestions dropdown.
          tagify.loading(false).dropdown.show.call(tagify, e.detail.value);
      })
}

function onTagEdit(e){
  console.log("onTagEdit: ", e.detail);
}

// invalid tag added callback
function onInvalidTag(e){
  console.log("onInvalidTag: ", e.detail);
}

// invalid tag added callback
function onTagClick(e){
  console.log(e.detail);
  console.log("onTagClick: ", e.detail);
}

function onTagifyFocusBlur(e){
  console.log(e.type, "event fired")
}

function onDropdownSelect(e){
  console.log("onDropdownSelect: ", e.detail)
}
    </script>
  

</x-app-layout>