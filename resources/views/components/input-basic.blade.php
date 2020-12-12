<div class="mb-6 {{ $boxWidth }}">
    <label for="{{ $name }}" class="block mb-2">
        <span class="text-gray-700 capitalize">{{ $label }}</span>
    </label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
    class="form-input mt-1 block w-full {{ $addClass ?? '' }} @error($name) border-red-400 @else border-gray-400 @enderror" {{ $attributes }}>

    @error($name)
    <p class="text-red-500 text-xs mt-2 error-message">{{ $message }}</p>
    @enderror
</div>