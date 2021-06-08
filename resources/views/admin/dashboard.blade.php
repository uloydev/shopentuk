@extends('layouts.template')

@section('body-id', 'dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="card-group">
        @for ($i = 0; $i < 3; $i++)
            <div class="card border-right {{ $i == 1 ? 'mx-3' : '' }}">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">
                                    {{ $valueMenus[$i] }}
                                </h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                {{ $menus[$i] }}
                            </h6>
                        </div>
                        <div class="ml-auto mt-lg-0">
                            <a href="{{ $links[$i] }}" id="add-product-btn" class="d-flex">
                                <span class="opacity-7 text-muted w-100 h-100">
                                    <i data-feather="plus-circle"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection

@push('scripts')
    {{-- <script src="{{ asset('template/dist/js/dashboard1.min.js') }}"></script> --}}
@endpush