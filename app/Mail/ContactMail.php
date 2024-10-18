<?php

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact; // Aggiungi questa proprietà

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact; // Imposta il contatto passato al costruttore
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Nuovo contatto da Boolfolio',
            replyTo: 'info@boolfolio.com',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.contact_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

