<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentEmail extends Mailable
{
    use Queueable, SerializesModels;
     public $data;
    /**
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@coopmart.com', 'LascocoMart')->subject('New Payment Notification')->view('email.payment_email')->with('data', $this->data);
    }
}
