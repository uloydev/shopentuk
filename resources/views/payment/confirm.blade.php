@extends('layouts.master')
@section('title', $title)
@section('body-id', Str::camel($title))
@section('content')
<div class="container py-10 px-5">
    @if (session('success'))
    <x-alert type="success">
        {{ session('success') }}
    </x-alert>
    @endif
    <h1 class="mb-10 text-2xl md:text-4xl text-center input-lowercase">
        Konfirmasi Pembayaran
    </h1>
    <div class="flex justify-center">
        <form action="{{ route('payment.store') }}" method="post" enctype="multipart/form-data"
        class="w-full max-w-screen-md shadow-md rounded px-8 py-5 bg-white">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10">
                <x-input-basic name="full_name" add-class="input-lowercase" label="Nama lengkap" required />
                <x-input-basic name="phone" type="text" label="No Telepon / Wa" required />
                <x-input-basic name="order_id" type="text" box-width="col-span-full"
                label="Nomor Order" value="{{ $order_id ?? '' }}" required />
                <x-input-basic name="payment_date" type="date" 
                box-width="col-span-full" label="Tanggal bayar" required />
                <div class="flex flex-col mb-5">
                    <span class="text-gray-900 text-base mr-5 mb-0">Pembayaran via</span>
                    <div class="mt-2 flex">
                        <div class="mr-5">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="payment_method" value="bca" checked>
                                <span class="ml-2">BCA</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="payment_method" value="ovo">
                                <span class="ml-2">OVO</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-upload">
                    <div class="box-upload__input">
                        <input class="box-upload__file" type="file" name="files[]" id="file"
                        data-multiple-caption="{count} files selected" multiple />
                        <label for="file" class="box-upload__text">
                            <strong>klik untuk pilih bukti pembayaran</strong>
                        </label>
                    </div>
                </div>
                <small class="text-red:500">*tidak wajib untuk upload bukti pembayaran</small>
            </div>
            <x-btn-primary text="Kirim" 
            class="flex w-full text-center justify-center md:w-auto bg-blue-500
            hover:bg-blue-600 focus:border-blue-600 text-white shadow-md focus:shadow-outline" />
        </form>
    </div>
</div>
@endsection