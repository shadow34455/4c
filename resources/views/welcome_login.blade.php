<x-app-layout>
  
    <div class="px-6 py-12 md:px-12 bg-gray-100 text-gray-800 text-center lg:text-left">
      <div class="container mx-auto xl:px-32">
        <div class="grid lg:grid-cols-2 gap-12 flex items-center">
          <div class="mt-12 lg:mt-0">
            <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tight mb-12"> <br /><span class="text-blue-600">4Competitions</span></h1>
            <p class="text-gray-600">
              The best place to answer your question and the best place for freelancing.  Enter our world to take advantage of our benefits</h4>
            </p>
          </div>
          <div class="mb-12 lg:mb-0">
            <div class="block rounded-lg shadow-lg bg-white px-6 py-12 md:px-12">
              <x-jet-validation-errors class="mb-4" />

              <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="grid md:grid-cols-2 md:gap-6">
              </div>
              <input type="email" name="email" class="form-control block w-full px-3 py-1.5 mb-6 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="email"/>
              <input type="password" name="password" class="form-control block w-full px-3 py-1.5 mb-6 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Password"/>
              
              {{-- <div class="form-check flex justify-center mb-6">
                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                  Subscribe to our newsletter
                </label>
              </div> --}}
              <button type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-6 py-2.5 mb-6 w-full bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Sign up</button>
            </form>
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
              {{ __('Forgot your password?') }}
          </a>
            <div class="text-center">
              <p class="mb-6">or sign in with:</p>
            </div>
            <a href="http://127.0.0.1:8000/auth/google"> <button aria-label="Continue with google" role="button" class="focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-gray-700 py-3.5 px-4 border rounded-lg border-gray-700 flex items-center w-full mt-1">
              <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/sign_in-svg2.svg" alt="google">
               <p class="text-base font-medium ml-4 text-gray-700">Continue with Google</p>
           </button></a>  
            </div>
          </div>
        </div>
      </div>
    </div>
 
  </x-app-layout>
  
