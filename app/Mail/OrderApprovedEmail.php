<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderApprovedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $memberData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($memberData)
    {
        //
        $this->memberData = $memberData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@lascocomart.com', 'LascocoMart')->subject('Order Approved')->view('email.approved_order')->with('memberData', $this->memberData);
   }
}
