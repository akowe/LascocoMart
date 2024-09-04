<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SalesEmail extends Mailable
{
  use Queueable, SerializesModels;
     public $sellerData;
    /**
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sellerData)
    {
        //
        $this->sellerData = $sellerData;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@coopmart.com', 'CoopMart')->subject('New Sales Notification')->view('email.sales')->with('sellerData', $this->sellerData);
    }
}
