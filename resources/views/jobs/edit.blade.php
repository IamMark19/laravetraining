<x-layout>
    <x-slot:headings>
       Edit Job: {{$job->title}}
    </x-slot:headings>

<!--
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
<form method="POST" action="/jobs/{{$job->id}}">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" name="title" id="title" autocomplete="title" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" value="{{$job->title}}">
              </div>
              @error('title')
              <p class="text-sm text-red-500 italic font-semibold m-t">{{$message}}</p>
              @enderror
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" name="salary" id="salary" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" value="{{$job->salary}}">
              </div>

              @error('salary')
                  <p class="text-sm text-red-500 italic font-semibold">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="mt-10">
        @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-500 italic">{{$error}}</li>
            @endforeach
          </ul>
      @endif
      </div> --}}

    </div>

    <div class="mt-6 flex items-center justify-between gap-x-6">
        <div class="flex items-center">
            <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
        </div>
        <div class="flex items-center gap-x-6">
            <a href="/jobs/{{$job->id}}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <div>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </div>
        </div>
  </form>
  <form action="/jobs/{{$job->id}}" method="POST" class="hidden" id="delete-form">
    @csrf
    @method('DELETE')
  </form>
</x-layout>