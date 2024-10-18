<?php

namespace App\Mail;  // Aggiungi il namespace corretto

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;  // Importa la classe Mailable
use Illuminate\Mail\Mailables\Envelope;  // Importa la classe Envelope
use Illuminate\Mail\Mailables\Content;   // Importa la classe Content (se usata)
use Illuminate\Queue\SerializesModels;

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
        $this->contact = $contact; // Assicura che $contact sia popolato correttamente
         // Aggiungi un controllo per verificare che i dati arrivino correttamente
        \Log::info('Dati passati a ContactMail:', $contact);
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
            view: 'email.contact_mail', // Assicurati che esista questa vista
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
