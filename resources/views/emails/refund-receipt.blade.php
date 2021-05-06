@component('mail::message')
    # Refund telah berhasil

    <p>Order id: {{ $order->id }}</p>
    <p>Price total: @currency($order->price_total)</p>
    <p>Point total: {{ $order->point_total }}</p>
    <p>Refund method: {{ $order->refund_method }}</p>
    @if ($order->refund_method != 'point')
    <p>Tanggal refund: {{ $order->refund->created_at }}</p>
    Silahkan lihat bukti refund di dashboard mu
    @component('mail::button', ['url' => route('my-account.history.order')])
    Pergi ke dashboard
    @endcomponent
    @else
    Silahkan lihat point history di dashboard mu
    @component('mail::button', ['url' => route('my-account.point.history')])
    Pergi ke dashboard
    @endcomponent
    @endif



    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
