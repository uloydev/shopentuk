<div class="mb-5 {{ $boxWidth }}">
    <label for="{{ $name }}" class="block mb-2">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" 
    class="appearance-none w-full px-3 py-2 border @error($name) border-red-400 @else border-gray-400 @enderror rounded" 
    {{ $attributes }} value="{{ old($name) }}">
    
    @error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>