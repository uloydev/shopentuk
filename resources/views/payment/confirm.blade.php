@extends('layouts.master')
@section('title', $title)
@section('body-id', Str::camel($title))
@section('content')
<div class="container py-10 px-5">
    <h1 class="mb-10 text-2xl md:text-4xl text-center input-lowercase">
        Konfirmasi Pembayaran
    </h1>
    <div class="flex justify-center">
        <form action="{{ route('payment.store', request()->query('order_id')) }}" method="post" enctype="multipart/form-data"
        class="w-full max-w-screen-md shadow-md rounded px-8 py-5 bg-white">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10 mb-5">
                <x-input-basic name="full_name" add-class="input-lowercase" 
                value="{{ $auth->name ?? '' }}" placeholder="Tulis nama lengkap akun mu" 
                label="Nama lengkap" required />
                <x-input-basic name="phone" type="text" 
                value="{{ old('phone') ?? $auth->phone ?? '' }}" label="No Telepon / Wa" 
                min="999999" max="9999999999999" placeholder="Contoh: 087771xxx" required />
                <x-input-basic name="payment_date" type="date" value="{{ old('payment_date') }}"
                box-width="col-span-full" label="Tanggal bayar" max="{{ date('Y-m-d') }}" required />
                <div class="mb-5 col-span-full">
                    <span class="text-gray-900 text-base mr-5 mb-0 block">Pembayaran via</span>
                    <div class="mt-2 flex space-x-5">
                        <x-input-checkbox label="BCA" value="bca" id="bca-option" name="payment_method" required />
                        <x-input-checkbox label="OVO" value="ovo" id="ovo-option" name="payment_method" />
                    </div>
                </div>
                <div class="box-upload col-span-full mb-3 relative bg-white">
                    <div class="box-upload__input">
                        <input class="box-upload__file opacity-0 overflow-hidden absolute"
                        type="file" name="files[]" id="file"
                        data-multiple-caption="{count} files selected" required />
                        <label for="file" class="box-upload__text 
                        absolute flex items-center justify-center h-full w-full">
                            <strong class="file-name">klik untuk pilih bukti pembayaran</strong>
                        </label>
                    </div>
                </div>
            </div>
            <x-btn action="submit" text="Kirim" type="primary" add-class="w-full lg:w-auto" />
        </form>
    </div>
</div>
@endsection