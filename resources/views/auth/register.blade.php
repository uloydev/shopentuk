@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Register') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <x-input-auth input-name="name" label-text="Name" type="text" autofocus/>
                        
                        <x-input-auth input-name="email" label-text="E-Mail Address" type="email"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email should be a valid email"/>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                {{ __('Phone number') }}
                            </label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="prefix-phone">+62</span>
                                      </div>
                                    <input id="phone" type="tel" name="phone" autocomplete="tel"
                                    class="form-control @error('phone') is-invalid @enderror" 
                                    value="{{ old('phone') }}" title="Input a valid phone number" 
                                    pattern="^[0-9]+$" aria-label="phone" aria-describedby="prefix-phone" required>
                                </div>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <x-input-auth input-name="password" label-text="Password" 
                        type="password" autocomplete="new-password" min="8"/>

                        <x-input-auth input-name="password_confirmation" label-text="Confirm Password" 
                        type="password" autocomplete="new-password"/>

                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div> --}}

                        <x-button-auth btn-text="Register" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
