<x-app-layout>
    <x-slot:header>
        <h1>List dei post</h1>
    </x-slot:header>

    <form class="bg-white max-w-7xl mx-auto mt-10 rounded-md shadow-md p-4" method="POST" action="/posts">


  <div class="space-y-12">

    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Post</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">New post.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm font-medium leading-6 text-gray-900">title</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

              <input type="text" name="title" id="title" autocomplete="title" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="janesmith">
            </div>
            @error('title')
               <span class="text-red-500"> {{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-span-full">
          <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
          <div class="mt-2">
            <textarea id="content" name="content" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
          <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the post.</p>

          @error('content')
          <span class="text-red-500"> {{ $message }}</span>
            @enderror
        </div>
      </div>
    </div>
  </div>
  @csrf
  <div class="flex justify-end gap-4">
    <button class="bg-indigo-600 hover:bg-indigo-500 px-4 py-2 rounded-md text-white">Crea</button>

  </div>
    </form>
</x-app-layout>
