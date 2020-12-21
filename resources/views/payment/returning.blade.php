@extends('layouts.master')

@section('title', $title)

@section('body-id', Str::camel($title))

@section('content')
    <div class="container py-10 px-5">
        <h1 class="mb-10 text-2xl md:text-4xl text-center input-lowercase">
            {{ ucwords($title) }}
        </h1>
        <div class="flex justify-center">
            <form action="{{ '/contact-us' }}" method="post" enctype="multipart/form-data"
            class="w-full max-w-screen-md shadow-md rounded px-8 py-5 bg-white">
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10">
                    <x-input-basic name="nama_customer" label="Nama "/>
                    <x-input-basic name="telepon_customer" label="No Telepon / Wa"/>
                    <x-input-basic name="email_customer" label="Email" box-width="col-span-full" />
                    <x-input-basic name="invoice_customer" label="Nomor pesanan" maxlength="9"
                    placeholder="Contoh: 0817xs7281js91" box-width="col-span-full" />
                    <div class="mb-6 col-span-full">
                        <label for="pesan" class="block mb-2">
                            <span>Pesan kamu</span>
                        </label>
                        <textarea class="form-textarea mt-1 block w-full" rows="6"
                        placeholder="Contoh: saya ingin order tapi tidak tahu caranya" required></textarea>
                    </div>
                </div>
                <x-btn action="submit" text="Kirim" type="primary" add-class="w-full lg:w-auto" />
            </form>
        </div>
    </div>
@endsection