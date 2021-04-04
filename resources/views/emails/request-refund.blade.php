@component('mail::message')
# Request refund from customer {{ $requestRefund->order->user->email }}

<p>Order ID: {{ $requestRefund->order_id }}</p>
<p>Payment date: {{ $requestRefund->payment_date }}</p>
<p>Rekening: {{ $requestRefund->rekening }}</p>
<p>Payment method: {{ $requestRefund->payment_method }}</p>

@component('mail::button', ['url' => 'google.com'])
    See order refund
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
