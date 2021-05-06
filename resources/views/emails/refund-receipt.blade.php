@component('mail::message')
# Refund telah berhasil

<p>Order id: {{ $refund->order->id }}</p>
<p>Tanggal refund: {{ $refund->created_at }}</p>

Silahkan lihat bukti refund di dashboard mu

@component('mail::button', ['url' => route('my-account.current.order')])
Pergi ke dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
