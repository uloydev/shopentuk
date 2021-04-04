@component('mail::message')
# Message from customer {{ $sender }}

<p>{{ $feedback->message }}</p>

{{-- @component('mail::button', ['url' => $url])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
