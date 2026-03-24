<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WarrantyOtpCode extends Mailable
{
    use Queueable, SerializesModels;

    public string $otp;
    public string $warrantyNumber;

    public function __construct(string $otp, string $warrantyNumber)
    {
        $this->otp = $otp;
        $this->warrantyNumber = $warrantyNumber;
    }

    public function build()
    {
        return $this
            ->subject('Your Proflect Warranty Verification Code')
            ->view('emails.warranty.otp')
            ->with([
                'otp' => $this->otp,
                'warrantyNumber' => $this->warrantyNumber,
            ]);
    }
}
