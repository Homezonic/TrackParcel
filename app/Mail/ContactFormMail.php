<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $phone;
    public $formmessage;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $phone, $formmessage)
    {
        $this->name        = $name;
        $this->email       = $email;
        $this->phone       = $phone;
        $this->formmessage = $formmessage;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    public function build()
    {
        return $this->from($this->email)
            ->subject('New Contact Form Submission')
            ->view('emails.contact-form');
    }
}