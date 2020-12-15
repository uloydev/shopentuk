<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn--primary']) }} {{ $attributes }}>
    {{ $slot }}
    <span>{{ $text }}</span>
</button>