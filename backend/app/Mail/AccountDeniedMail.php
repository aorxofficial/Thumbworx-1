<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountDeniedMail extends Mailable //If renaming files dont forget to change the class.
{
    use Queueable, SerializesModels;

    public $mailData;


     public function __construct($mailData)
     {
         $this->mailData = $mailData;
     }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Denied Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            // view: 'denied_email', 
            view: 'AccountDeniedMail', 
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
