@extends('layouts.master')

@section('body-id', 'auth')

@section('title', 'Login atau register untuk menikmati semua fitur kami')

@section('header')
    <div class="flex py-32 items-center relative flex-grow justify-center">
        <div class="bg-overlay"></div>
        <div class="z-10 text-white font-shadows-light font-bold">
            <h1 class="text-6xl">Akun Saya</h1>
            <hr class="bg-white border-white my-8">
            <h2 class="text-4xl">Selamat Datang</h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 py-12">
            <x-section-auth name="Masuk" :action="url('login')">
                @include('auth.email-pw', [
                    'placeholderEmail' => 'Email akun anda',
                    'placeholderPw' => 'Kata sandi akun anda'
                ])
                <div class="mb-3 flex items-center">
                    <label for="remember" class="ml-2 order-last">Ingat saya</label>
                    <input type="checkbox" name="remember" 
                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                </div>
            </x-section-auth>
            <x-section-auth name="Daftar" :action="url('register')">
                <x-input-basic name="name" label="Nama pengguna" value="{{ old('name') }}"
                placeholder="Contoh: bariq dharmawan" required />
                <x-input-basic name="phone" type="tel" label="Nomor telepon" 
                placeholder="Contoh: 087771406656" minlength="6" maxlength="13" autocomplete="tel" 
                pattern="^[0-9]+$" 
                title="Phone number should be a valid phone number: start with 0, length between " 
                value="{{ old('phone') }}" required />
                @include('auth.email-pw', [
                    'placeholderEmail' => 'Email akun anda',
                    'placeholderPw' => 'Kata sandi akun anda'
                ])
                <x-input-basic name="password_confirmation" label="Password Konfirmasi" type="password"
                placeholder="Sama dengan password anda" min="8" required />
                <p class="text-sm text-gray-600">
                    Data pribadi Anda akan digunakan untuk menunjang pengalaman Anda di seluruh situs web ini,
                    untuk mengelola akses ke akun Anda, dan untuk tujuan lain yang dijelaskan
                    dalam kebijakan privasi kami.
                </p>
            </x-section-auth>
        </div>
    </div>
@endsection