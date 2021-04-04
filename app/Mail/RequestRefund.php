<?php

namespace App\Mail;

use App\Models\Refund;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestRefund extends Mailable
{
    use Queueable, SerializesModels;

    public $requestRefund;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Refund $requestRefund)
    {
        $this->requestRefund = $requestRefund;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $requestRefund = $this->requestRefund;
        return $this->from('sanchez77rodriguez@gmail.com')
                    ->replyTo($requestRefund->order->user->email)
                    ->markdown('emails.request-refund');
    }
}
