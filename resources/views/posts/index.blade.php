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
            <h2 class="font-semibold">{{ $post->title }}</h2>
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
