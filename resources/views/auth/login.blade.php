@extends('layouts.master')

@section('body-id', 'register')

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
            <section>
                <h3 class="mb-5 text-2xl">Masuk</h3>
                <div class="auth-box">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @include('auth.email-pw', [
                            'placeholderEmail' => 'Email akun anda',
                            'placeholderPw' => 'Kata sandi akun anda'
                        ])
                        <div class="mb-3 flex items-center">
                            <label for="remember" class="ml-2 order-last">Ingat saya</label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        </div>
                        <x-btn-primary text="Masuk"/>
                    </form>
                </div>
            </section>
            <section>
                <h3 class="mb-5 text-2xl">Daftar</h3>
                <div class="auth-box">
                    <form action="{{ route('register') }}" id="form-register" method="POST">
                        @csrf
                        <x-input-basic name="name" label="Nama pengguna" 
                        placeholder="Contoh: bariqdharmawans" required/>
                        <x-input-basic name="phone" type="tel" label="Nomor telepon" 
                        placeholder="Contoh: 87771406656" autocomplete="tel" pattern="^[0-9]+$" required/>
                        @include('auth.email-pw', [
                            'placeholderEmail' => 'Email akun anda',
                            'placeholderPw' => 'Kata sandi akun anda'
                        ])
                        <x-input-basic name="password_confirmation" label="Password Konfirmasi" 
                        type="password" placeholder="Sama dengan password anda" min="8" autocomplete="new-password" required/>
                    </form>
                    <p class="text-sm text-gray-600">
                        Data pribadi Anda akan digunakan untuk menunjang pengalaman Anda di seluruh situs web ini, 
                        untuk mengelola akses ke akun Anda, dan untuk tujuan lain yang dijelaskan 
                        dalam kebijakan privasi kami.
                    </p>
                    <x-btn-primary text="Daftar" class="mt-5" form="form-register"/>
                </div>
            </section>
        </div>
    </div>
@endsection
