<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountApprovedMail extends Mailable //If renaming files dont forget to change the class.
{
    use Queueable, SerializesModels;

    public $approvedMailData;


     public function __construct($approvedMailData)
     {
         $this->approvedMailData = $approvedMailData;
     }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Approved Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            // view: 'denied_email', 
            view: 'AccountApprovedMail', 
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
