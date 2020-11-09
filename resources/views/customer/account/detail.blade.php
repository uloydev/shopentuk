@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="block">
        @for ($i = 0; $i < 3; $i++)
            <x-input-basic label="{{ ucwords($labelInput[$i]) }}" name="{{ Str::snake($labelInput[$i]) }}" 
            placeholder="Input Your {{ ucwords($labelInput[$i]) }}"
            value="{{ $userData[$i] ?? '' }}" required />
        @endfor
        <x-btn-primary text="Save changes"
        class="w-full md:w-auto text-white rounded bg-teal-500 hover:bg-teal-600 focus:bg-teal-700
        border-b-4 border-red-900 border-opacity-25 transform focus:translate-y-1" />
    </div>
@endsection