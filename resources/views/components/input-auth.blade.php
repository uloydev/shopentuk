<div class="form-group row">
    <label for="{{ $inputName }}" class="col-md-4 col-form-label text-md-right">
        {{ __($labelText) }}
    </label>

    <div class="col-md-6">
        <input id="{{ $inputName }}" class="form-control @error($inputName) is-invalid @enderror" 
        name="{{ $inputName }}" value="{{ old($inputName) }}" required {{ $attributes }}>
        {{-- $attributes itu default untuk attribute tambahan di component --}}

        @error($inputName)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>