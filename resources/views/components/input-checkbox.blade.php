<label class="inline-flex items-center" for="{{ $id }}">
    <input type="radio" class="form-radio border-blue-500" name="{{ $name }}"
    value="{{ $value }}" id="{{ $id }}" 
    {{ $isChecked == 'true' ? 'checked' : '' }} {{ $attributes }}>
    <span class="ml-3 capitalize">{{ $label }}</span>
</label>
@error($name)
    <p class="text-red-500 text-xs">{{ $message }}</p>
@enderror