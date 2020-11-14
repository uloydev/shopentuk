@extends('layouts.master')
@section('title', $title)
@section('body-id', Str::camel($title))
@section('content')
    <div class="container py-10 px-5">
        <h1 class="mb-10 text-2xl md:text-4xl text-center input-lowercase">{{ ucwords($title) }}</h1>
        <div class="flex justify-center">
            <form action="{{ 'test' }}" method="post" enctype="multipart/form-data"
            class="w-full max-w-screen-md shadow-md rounded px-8 py-5 bg-white">
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10">
                    <x-input-basic name="nama_lengkap" label="Nama "/>
                    <x-input-basic name="nama_lengkap" label="No Telepon / Wa"/>
                    <x-input-basic name="nama_lengkap" label="Email" box-width="col-span-full" />
                    <div class="mb-6 col-span-full">
                        <label for="pesan" class="block mb-2">
                            <span>Pesan kamu</span>
                        </label>
                        <textarea class="form-textarea mt-1 block w-full" rows="6"
                        placeholder="Contoh: saya ingin order tapi tidak tahu caranya" required></textarea>
                    </div>
                </div>
                <x-btn-primary text="Kirim" 
                class="flex w-full text-center justify-center md:w-auto bg-blue-500 hover:bg-blue-600 focus:border-blue-600 text-white shadow-md focus:shadow-outline" />
            </form>
        </div>
    </div>
@endsection