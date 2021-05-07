<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\PaymentConfirmation;
use App\Models\PaymentConfirmationImage;
use App\Rules\AlphaSpace;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('manage');
    }

    public function showConfirm(Request $request)
    {
        return view('payment.confirm', [
            'title' => 'Konfirmasi pembayaran',
            'order_id' => $request->order_id
        ]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'full_name' => ['required', 'max:100', 'min:3'],
            'phone' => ['required', 'digits_between:6,13'],
            'payment_date' => ['required'],
            'payment_method' => ['required', Rule::in(['bca', 'ovo'])]
        ]);
        
        $paymentConfirmation = PaymentConfirmation::create(
            $request->only([
                'full_name',
                'phone',
                'payment_date',
                'payment_method'
                ])
                + ['order_id' => $id]
            );
            
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $item) {
                $paymentImage = $item->store('public/payment-confirmation');
                PaymentConfirmationImage::create([
                    'file' => $paymentImage,
                    'payment_confirmation_id' => $paymentConfirmation->id
                ]);
            }
        }
        return redirect()->route('my-account.current.order')->with(['success' => 'sukses membuat konfirmasi pembayaran']);
    }

    public function inputResi()
    {
        $isNeedMoreAction = false;
        $order = Order::findOrFail(request('order_id'));
        $order->no_resi = request('no_resi');
        foreach ($order->orderProducts->where('is_digital', true) as $orderItem) {
            if (empty($orderItem->voucher_code)) {
                $isNeedMoreAction = true;
                break;
            }
        }
        if (! $isNeedMoreAction) {
            $order->status = 'shipping';
        }
        $order->save();
        return redirect()->back()->with(
            'success',
            'Successfully insert resi number for order ' . request('order_id')
        );
    }
}
