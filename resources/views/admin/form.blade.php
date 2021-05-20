<form action="" method="POST" id="{{ $idForm }}" autocomplete="off"
@if ($errors->any()) class="having-error" @endif>
    @csrf
    @if ($idForm == 'form-edit-admin')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-6">
            <x-input-template 
                name="name" 
                type="text"
                label="Admin Fullname" 
                id="admin-name-{{ $action }}"
                placeholder="Ex: bariq dharmawan" autocomplete="off"
                value="{{ old('name') }}" required>
            </x-input-template>
        </div>
        <div class="col-lg-6">
            <x-input-template 
                name="email" 
                type="email"
                label="Email admin" 
                id="admin-email-{{ $action }}"
                placeholder="Ex: dharmawan@bariq.me" autocomplete="off"
                value="{{ old('email') }}" required>
            </x-input-template>
        </div>
        <div class="col-lg-6">
            <x-input-template 
                name="phone" 
                type="tel"
                label="Admin phone number" 
                id="admin-phone-{{ $action }}"
                placeholder="Ex: 87771406656" autocomplete="off"
                value="{{ old('phone') }}" required>
            </x-input-template>
        </div>
        @if ($action === 'add')
        <div class="col-lg-6">
            <x-input-template 
                name="password" 
                type="password"
                label="Admin default password" 
                id="admin-password-{{ $action }}"
                placeholder="Ex: gakadapassword" autocomplete="off"
                value="{{ old('password') }}"
                required>
            </x-input-template>
        </div>
        <div class="col-lg-6">
            <x-input-template 
                name="password_confirmation" 
                type="password"
                label="Confirm password" 
                id="admin-confirm-pw-{{ $action }}"
                placeholder="Please confirm the password" autocomplete="off"
                value="{{ old('password_confirmation') }}"
                required>
            </x-input-template>
        </div>
        @else
        <div class="col-lg-6">
            <x-input-template 
                name="password" 
                type="password"
                label="Admin default password" 
                id="admin-password-{{ $action }}"
                placeholder="Ex: gakadapassword" autocomplete="off"
                value="{{ old('password') }}">
            </x-input-template>
        </div>
        <div class="col-lg-6">
            <x-input-template 
                name="password_confirmation" 
                type="password"
                label="Confirm password" 
                id="admin-confirm-pw-{{ $action }}"
                placeholder="Please confirm the password" autocomplete="off"
                value="{{ old('password_confirmation') }}">
            </x-input-template>
        </div>
        @endif

    </div>
</form>