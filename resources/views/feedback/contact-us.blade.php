@extends('layouts.master')
@section('title', $title)
@section('body-id', Str::camel($title))
@section('content')
    @if (session('success'))
    <div class="flex items-center bg-green-600 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
        </svg>
        <p>{{ session('success') }}</p>
    </div>
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