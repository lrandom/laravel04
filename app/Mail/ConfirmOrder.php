<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $orderId;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderId)
    {
        //
        //dd($orderId);
        $this->orderId = $orderId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->orderId);
        return $this->subject("Confirm order ".$this->orderId)->view('mail.confirm-order')->with(['orderId' => $this->orderId]);
    }
}
