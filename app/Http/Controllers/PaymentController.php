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

    public function manage()
    {
        $title = 'Manage payment confirmation';
        $allOrder = Order::where('status', 'unpaid')->has('paymentConfirmation', '>=', 1)->get();

        return view('payment.manage-confirm', get_defined_vars());
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
                $paymentImage = $item->store('payment-confirmation');
                PaymentConfirmationImage::create([
                    'file' => $paymentImage,
                    'payment_confirmation_id' => $paymentConfirmation->id
                ]);
            }
        }
        return redirect()->back()->with(['success' => 'sukses membuat konfirmasi pembayaran']);
    }

    public function inputResi()
    {
        Order::where('id', request('order_id'))->update([
            'no_resi' => request('no_resi'),
            'status' => 'shipping'
        ]);

        return redirect()->back()->with(
            'success',
            'Successfully insert resi number for order <b>' . request('order_id') . '</b>'
        );
    }
}
