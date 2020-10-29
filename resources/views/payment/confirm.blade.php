@extends('layouts.master')
@section('title', $title)
@section('body-id', Str::camel($title))
@section('content')
    <div class="container py-10 px-5">
        <h1 class="mb-10 text-2xl md:text-4xl text-center input-lowercase">Konfirmasi Pembayaran</h1>
        <div class="flex justify-center">
            <form action="{{ 'test' }}" method="post" 
            class="w-full max-w-screen-md shadow-md rounded px-8 py-5 bg-white">
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10">
                    <x-input-basic name="nama_lengkap" label="Nama lengkap"/>
                    <x-input-basic name="nama_lengkap" label="No Telepon / Wa"/>
                    <x-input-basic name="nama_lengkap" type="number" box-width="col-span-full" label="Nomor Order"/>
                    <div class="flex flex-col mb-5">
                        <span class="text-gray-900 text-base mr-5 mb-0">Pembayaran via</span>
                        <div class="mt-2 flex">
                          <div class="mr-5">
                            <label class="inline-flex items-center">
                              <input type="radio" class="form-radio" name="radio" value="1" checked>
                              <span class="ml-2">BCA</span>
                            </label>
                          </div>
                          <div>
                            <label class="inline-flex items-center">
                              <input type="radio" class="form-radio" name="radio" value="2">
                              <span class="ml-2">OVO</span>
                            </label>
                          </div>
                        </div>
                    </div>
                    <x-input-basic name="tgl_bayar" type="date" box-width="col-span-full" label="Tanggal bayar"/>
                </div>
                <x-btn-primary text="Kirim" 
                class="flex w-full text-center justify-center md:w-auto bg-blue-500 hover:bg-blue-600 focus:border-blue-600 text-white shadow-md focus:shadow-outline" />
            </form>
        </div>
    </div>
@endsection
