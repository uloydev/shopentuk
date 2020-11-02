<div class="mb-5 {{ $boxWidth }}">
    <label for="{{ $name }}" class="block mb-2">
        <span>{{ $label }}</span>
    </label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" 
    class="appearance-none w-full px-3 py-2 border rounded {{ $addClass ?? '' }} @error($name) border-red-400 @else border-gray-400 @enderror"
    {{ $attributes }} value="{{ old($name) }}">
    
    @error($name)
    <p class="text-red-500 text-xs mt-2 error-message">{{ $message }}</p>
    @enderror
</div>