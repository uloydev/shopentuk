<button type="{{ $type }}" {{ $attributes->merge(['class' => 'focus:outline-none transition duration-150 bg-gray-300 hover:bg-gray-900 py-2 px-6 border border-b-4 border-gray-300 hover:text-white']) }}>
    {{ $slot }}
    <span>{{ $text }}</span>
</button>