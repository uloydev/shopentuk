<div class="alert alert-{{ $type }} fade show
{{ $isDismissable == 'true' ? 'alert-dismissible' : '' }} mb-0 {{ $addClass }}" role="alert">
    @if ($isDismissable == 'true')
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    @endif
    <div class="d-flex justify-content-center">
        <p class="text-center text-capitalize mb-0">{!! $message !!}</p>
        {{ $slot }}
    </div>
</div>