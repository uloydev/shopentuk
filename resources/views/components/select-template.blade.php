<div class="form-group">
    <label for="{{ $id }}" class="capitalize">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}" class="custom-select">
        {{ $slot }}
    </select>
</div>