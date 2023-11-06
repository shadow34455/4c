<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register-step2.post') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"   />
            </div>

            <div class="mt-4">
                <x-jet-label for="Job_title" value="{{ __('Job_title') }}" />
                <x-jet-input id="Job_title" class="block mt-1 w-full" type="text" name="Job_title" :value="old('Job_title')"  />
            </div>
            <div class="mt-4">
                <x-jet-label for="education" value="{{ __('education') }}" />
                <x-jet-input id="education" class="block mt-1 w-full" type="text" name="education" :value="old('education')"  />
            </div>
            <div class="mt-4">
                <x-jet-label for="date" value="{{ __('Date') }}" />
                <x-jet-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')"  />
            </div>
            <div class="mt-4">
                <x-jet-label for="Gender" value="{{ __('Gender') }}" />
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
                <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="fmale">
                <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                </div>
                <div class="flex justify-left mt-4">
                    <div class="mb-3 xl:w-96">
                      <select name="role" required class="form-select appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-700 focus:outline-none" required aria-label="Default select example">
                         
                        <option selected disabled value="">Choose...</option>
                          <option value="2">personal account</option>
                          <option value="3">business account</option>
                       
                      </select>
                    </div>
                  </div>

                <x-jet-button class="ml-4">
                    {{ __('Finish Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
