<?php

namespace App\Mail;

use App\Models\FeedbackCustomer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendFeedback extends Mailable
{
    use Queueable, SerializesModels;

    public $feedback;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(FeedbackCustomer $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $feedback = $this->feedback;

        return $this->from('sanchez77rodriguez@gmail.com')
                    ->replyTo($feedback->email)
                    ->markdown('emails.feedback', [
                        'url' => 'google.com',
                        'sender' => $feedback->email
                    ]);
    }
}
