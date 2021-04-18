@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', $title)
@section('content')
    <div id="accordion" class="custom-accordion mb-4">
        <div class="card">
            <div class="card-header">
                <h1 class="h3 font-weight-bold">{{ ucwords($title) }}</h1>
            </div>
            <div class="card-body">
                <div class="p-3 bg-light mb-5" id="gameDetail">
                    <h3 class="text-primary font-weight-bold">Game Details</h3>
                    <hr>
                    <h5>Game Period : <span id="period"></span></h5>
                    <h5>Start Time : <span id="start"></span></h5>
                    <h5>Finish Time : <span id="finish"></span></h5>
                    <h5>Status : <span id="status"></span></h5>
                    <h5>Custom Game : <span id="isCustom"></span></h5>
                    <h5>Bid Total : <span id="bidTotal"></span></h5>
                    <h5>Selected Winners : <span id="winners"></span></h5>
                </div>
                <form action="{{ route('admin.game.current.set-winner') }}" method="post" id="setWinnerForm">
                    @csrf
                    <input type="hidden" name="winner_option_id">
                    <input type="hidden" name="game_id">
                </form>
                <div>
                    <h3 class="d-inline-block text-primary font-weight-bold ml-2">Pilih Pemenang</h3>
                    <h2 class="d-inline-block float-right mr-2" id="gameTimer">00:00</h2>
                </div>
                <p class="ml-2">data pada halaman ini akan direfresh setiap 5 detik.</p>
                <div class="row justify-content-center no-gutters mt-3" id="gameOptions">
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="confirmModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>apa anda yakin memilih ini sebagai pemenang game ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="confirmBtn">YES</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="alertModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>tidak bisa menentukan pemenang game jika waktu kurang dari 10 detik.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end custom accordions-->
@endsection
