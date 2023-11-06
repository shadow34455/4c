
<x-app-layout>


    <div class="mt-4 ">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
             
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="/create" method="POST" enctype="multipart/form-data">
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
    
                  <div class="form-group">
                                
                </div>
                  <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700"> title </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        
                        <input type="text" name="title" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="" required>
                      </div>
                    </div>
                  </div>
                  <div>
                    <label for="about" class="block text-sm font-medium text-gray-700"> body </label>
                    <div class="mt-1">
                      <textarea id="content" name="body" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="body" required></textarea>
                    </div>
                  </div>
             <div>
              <label for="about" class="block text-sm font-medium text-gray-700"> Tags </label>
              <div class="mt-1">
                <input name='tags'
                class='some_class_name'            
                placeholder='write some tags'      
                value='' 
                data-blacklist=''>   </div>
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
    