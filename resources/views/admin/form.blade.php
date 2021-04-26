<form action="{{-- routing di custom-dashboard.js --}}" method="POST" id="{{ $idForm }}" autocomplete="off">
    @csrf
    @if ($idForm == 'form-edit-admin')
        @method('PUT')
    @endif
    <div class="row">
        @for ($i = 0; $i < count($inputColumn); $i++) 
            <div class="col-lg-6">
                <x-input-template name="{{ $inputColumn[$i]['name'] }}" type="{{ $inputColumn[$i]['type'] }}"
                    label="{{ $inputColumn[$i]['label'] }}" id="{{ $inputColumn[$i]['id'] }}"
                    placeholder="{{ $inputColumn[$i]['placeholder'] ?? '' }}" autocomplete="off"
                    value="{{ $inputColumn[$i]['value'] ?? old($inputColumn[$i]['name']) }}" required>
                    {{-- @if ($inputColumn[$i]['name'] == 'password')
                    <small id="name" class="form-text text-muted px-1">
                        If empty, it'll using the default password : <b>gakadapassword</b>
                    </small>
                    @endif --}}
                </x-input-template>
            </div>
            @if ($i % 2 == 1)
                </div>
                <div class="row">
            @endif
        @endfor
    </div>
</form>