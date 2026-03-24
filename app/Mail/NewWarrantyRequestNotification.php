<?php

namespace App\Mail;

use App\Models\Warranty;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewWarrantyRequestNotification extends Mailable
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
            ->subject('New warranty request received')
            ->view('emails.warranty.admin')
            ->with(['warranty' => $this->warranty]);
    }
}
