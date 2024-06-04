<button type="button" {{
$attributes->merge([
    'class' => 'text-lg py-2 px-4 rounded-lg shadow-lg transition-colors duration-300'
]) }}>
    {{ $slot }}
</button>
