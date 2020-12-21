@if (isset($action) and $action === 'submit' || 'button' || 'reset')
    @php
        $el = 'button';
    @endphp
@else
    @php
        $el = 'link';
    @endphp
@endif

@switch($el)
    @case('link')
    <a href="{{ $action ?? 'javascript:void(0)' }}" class="btn btn--{{ $type }} {{ $addClass ?? '' }}" 
    {{ $attributes }}>
        {{ $slot }}
        <span>{{ $text ?? '' }}</span>
    </a>
    @break
    @case('button')
    <button type="{{ $action }}" class="btn btn--{{ $type }} {{ $addClass ?? '' }}" {{ $attributes }}>
        {{ $slot }}
        <span>{{ $text ?? '' }}</span>
    </button>
    @break
@endswitch