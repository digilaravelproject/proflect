<?php

namespace App\Mail;

use App\Models\Warranty;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WarrantyRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public Warranty $warranty;

    /**
     * Create a new message instance.
     */
    public function __construct(Warranty $warranty)
    {
        $this->warranty = $warranty;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject('Thank you for your Proflect warranty request')
            ->view('emails.warranty.customer')
            ->with(['warranty' => $this->warranty]);
    }
}
