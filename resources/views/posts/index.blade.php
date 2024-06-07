<x-app-layout>
    <x-slot:header>
        <h1>List dei post</h1>
    </x-slot:header>
<div class="container px-4 py-2 ">
    <div class="mx-auto max-w-7xl">

        <div>
            <a href="{{ route('posts.create') }}">Add Post</a>
        </div>

    <ul class="flex flex-col gap-4">
        @foreach ($posts as $post)
        <li class="flex flex-col gap-2">

            <div class="flex justify-between gap-4">
            <h2 class="font-semibold">{{ $post->title }}</h2>
            @can('update', $post)
            {{-- <a href="{{ route('posts.edit', [$post])}}" class="text-blue-500">Edit</a> --}}
            <x-custom.button type="button">
                <span>Edit</span>
            </x-custom.button>

            <x-custom-link class="text-white bg-red-500" method="DELETE" href="{{ route('posts.destroy', [$post]) }}">

            </x-custom-link>
            @endcan

        </div>
            <p class="text-gray-500 text-sm">{{ $post->content }}</p>


        </li>
        @endforeach
    </ul>

    <?php
        $name = '<script>alert("ciao")</script>';
    ?>


    {{ $posts->links() }}
</div>
</div>
</x-app-layout>
