<x-layout heading="Login ">


    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">


            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

              <x-form-field>
                <x-form-label label="Email" for="email"/>
                <x-form-input required value="{{ old('email') }}" name="email" id="email" type="email"/>
                <x-form-error name="email"/>
              </x-form-field>

              <x-form-field>
                <x-form-label label="Password" for="password"/>
                <x-form-input required value="{{ old('password') }}" name="password" id="password" type="password"/>
                <x-form-error name="password"/>
              </x-form-field>

                <div class="sm:col-span-4">
                    <x-form-error name="root"/>
                </div>
            </div>
          </div>


        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Register</a>
          <x-form-primary-button type="submit">Log In</x-form-primary-button>
        </div>
      </form>


    </x-layout>
