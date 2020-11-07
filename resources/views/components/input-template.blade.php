<div class="form-group">
    <label class="form-control-label" for="{{ $id }}">
        {{ $label }}
    </label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $id }}" {{ $attributes }}
    placeholder="{{ $placeholder }}" class="form-control @error($name) is-invalid @enderror">
    {{ $slot }}
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>