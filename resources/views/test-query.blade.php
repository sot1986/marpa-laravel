<ul>
@foreach ($users as $user)
    <li>
        <p>{{ $user->name }}</p>
        <ul>
            @foreach ($user->posts as $post)
            <h4>{{ $post->title }}</h4>
            @endforeach

        </ul>
    </li>

@endforeach
</ul>
