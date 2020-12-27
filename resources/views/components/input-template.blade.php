<div class="form-group">
    <label class="form-control-label text-capitalize" for="{{ $id }}">
        {{ $label }}
    </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" {{ $attributes }}
    placeholder="{{ $placeholder }}" class="form-control @error($name) is-invalid @enderror">
    {{ $slot }}
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>