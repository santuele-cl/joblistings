<x-layout heading="Create Post">


<form method="POST" action="/posts">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Post Details</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Lorem Impsum.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                <input value="{{ $_POST["body"] ?? "" }}" type="text" name="body" id="body"  class="block flex-1 border-0 bg-transparent py-2 pl-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" >

              </div>
            </div>

            @error('body')
                <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
            @enderror

          </div>


        </div>
      </div>


    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/posts" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
    </div>
  </form>


</x-layout>
