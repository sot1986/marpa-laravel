@props(['method' => 'GET', 'render' => "a"])

@if ($method == 'GET' && $render == "a")
    <a {{ $attributes->merge(['class' => 'text-white bg-indigo-600 px-4 py-2 rounded-md']) }}>
        {{ $slot }}
    </a>
@else
    <form method="{{ $method === "GET" ? "GET" : "POST" }}" action="{{ $attributes->get('href') }}">
        @csrf
        @if($method !== 'POST' && $method !== 'GET')
            @method($method)
        @endif
        <button {{ $attributes->merge(['class' => 'text-white bg-indigo-600 px-4 py-2 rounded-md']) }}>
            {{ $slot }}
        </button>
    </form>
@endif
