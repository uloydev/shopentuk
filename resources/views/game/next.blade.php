@extends('layouts.master')

@section('title', $title)

@section('body-id', Str::camel($title))

@section('content')
    <div class="container py-10">
        <div class="flex justify-between mb-10">
            <a href="{{ route('game.index') }}" class="flex items-center">
                <box-icon name='arrow-back'></box-icon>
                <span class="ml-3">Kembali ke menu game</span>    
            </a>
            <h1 class="text-xl font-bold">Jadwal game selanjutnya</h1>
        </div>
        <ul class="bg-white">
            @for ($i = 0; $i < 10; $i++)
            <li class="border border-gray-400 p-3 hover:bg-gray-300 
            cursor-pointer flex justify-between">
                <span>Judul game</span>
                <time>{{ date('M d, Y H:i') }}</time>
            </li>
            @endfor
        </ul>
    </div>
@endsection

