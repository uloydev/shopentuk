@component('mail::message')

<p>Order ID: {{ $order->id }}</p>
<p>Payment date: {{ $order->paymentConfirmation->payment_date }}</p>
<p>Rekening: {{ $order->user->rekening }}</p>
<p>Payment method: {{ $order->paymentConfirmation->payment_method }}</p>

<h1>Orderan kamu dicancel admin, kamu bisa refund melalui dashboard</h1>

@component('mail::button', ['url' => route('my-account.current.order')])
    See order refund
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
