@component('mail::message')

<p>Order ID: {{ $order->id }}</p>
<p>Price total: @currency($order->price_total)</p>
<p>Point total: {{ $order->point_total }}</p>

<h1>Orderan kamu dicancel admin, kamu bisa refund melalui dashboard</h1>

@component('mail::button', ['url' => route('my-account.current.order')])
    See order refund
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
