@extends('layouts.master')
@section('title', $title)
@section('body-id', Str::camel($title))
@section('content')
    @if (session('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif
    <div class="container py-10 px-5">
        <h1 class="mb-10 text-2xl md:text-4xl text-center input-lowercase">{{ ucwords($title) }}</h1>
        <div class="flex justify-center">
            <form action="{{ route('contact-us.store') }}" method="post" enctype="multipart/form-data"
            class="w-full max-w-screen-md shadow-md rounded px-8 py-5 bg-white">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10">
                    <x-input-basic name="name" label="Nama" value="{{ Auth::user()->name ?? '' }}"
                    title="Mohon isi nama asli mu" required />
                    <x-input-basic name="telephone" type="tel" label="No Telepon / Wa" 
                    value="{{ Auth::user()->phone ?? '' }}" 
                    title="Mohon isi nomor hp aktif mu" required />
                    <x-input-basic name="email" label="Email" box-width="col-span-full"
                    value="{{ Auth::user()->email ?? '' }}" 
                    title="Mohon isi email mu dengan format valid" required />
                    <div class="mb-6 col-span-full">
                        <label for="pesan" class="block mb-2">
                            <span>Pesan kamu</span>
                        </label>
                        <textarea class="form-textarea mt-1 block w-full" rows="6" name="message"
                        placeholder="Contoh: saya ingin order tapi tidak tahu caranya" required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-2 error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <x-btn-primary text="Kirim" 
                class="flex w-full text-center justify-center md:w-auto bg-blue-500 hover:bg-blue-600 focus:border-blue-600 text-white shadow-md focus:shadow-outline" />
            </form>
        </div>
    </div>
@endsection