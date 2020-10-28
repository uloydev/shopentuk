<button type="{{ $type }}" {{ $attributes->merge(['class' => 'bg-gray-300 hover:bg-gray-900 py-2 px-6 border-2 border-gray-300 hover:text-white' . $addClass]) }}>
    {{ $text }}
</button>