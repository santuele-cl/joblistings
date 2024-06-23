<x-layout heading="Register ">


    <form method="POST" action="/register">
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">


            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


              <x-form-field>
                <x-form-label label="First Name" for="first_name"/>
                <x-form-input required value="{{ old('first_name') }}" name="first_name" id="first_name"/>
                <x-form-error name="first_name"/>
              </x-form-field>

              <x-form-field>
                <x-form-label label="Last Name" for="last_name"/>
                <x-form-input required value="{{ old('last_name') }}" name="last_name" id="last_name"/>
                <x-form-error name="last_name"/>
              </x-form-field>


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

              <x-form-field>
                <x-form-label label="Confirm Password" for="password_confirmation"/>
                <x-form-input required value="{{ old('password_confirmation') }}" name="password_confirmation" id="password_confirmation" type="password"/>
                <x-form-error name="password_confirmation"/>
              </x-form-field>

            </div>
          </div>


        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Login</a>
          <x-form-primary-button type="submit">Add</x-form-primary-button>
        </div>
      </form>


    </x-layout>
