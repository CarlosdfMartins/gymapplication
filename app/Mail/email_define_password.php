<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\ServiceEnc\Enc;

class email_define_password extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $name;
    public $apelido;

    public function __construct($token, $name, $apelido)
    {
        $token = decrypt($token);
        $this->token = $token;
        $this->name = $name;
        $this->apelido = $apelido;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Defina a sua Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.tokenPass',
        );
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
}
