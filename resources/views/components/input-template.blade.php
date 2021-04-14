<div class="form-group">
    <label class="form-control-label text-capitalize" for="{{ $id }}">
        {{ $label }}
    </label>
    @if ($type == 'select')
        <select class="form-control {{ $addClass }} @error($name) is-invalid @enderror" id="{{ $id }}"
            name="{{ $name }}" {{ $attributes }}>
            <option selected disabled>{{ $placeholder }}</option>
            @foreach ($options as $option)
                <option value="{{ $option->value }}">{{ $option->text }}</option>
            @endforeach
        </select>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" {{ $attributes }}
            placeholder="{{ $placeholder }}"
            class="form-control {{ $addClass }} @error($name) is-invalid @enderror">
    @endif
    {{ $slot }}
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
