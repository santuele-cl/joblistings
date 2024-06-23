<x-layout heading="Create Job">


<form method="POST" action="/jobs">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Job Details</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Lorem Impsum.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


          <x-form-field>
            <x-form-label label="Title" for="title"/>
            <x-form-input value="{{ old('title') }}" name="title" id="title"/>
            <x-form-error name="title"/>
          </x-form-field>


          <x-form-field>
            <x-form-label label="Salary" for="salary"/>
            <x-form-input value="{{ old('salary') }}" name="salary" id="salary"/>
            <x-form-error name="salary"/>
          </x-form-field>


        </div>
      </div>


    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/jobs" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
      <x-form-primary-button type="submit">Add</x-form-primary-button>
    </div>
  </form>


</x-layout>
