<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;  // Assicurati che questa classe esista
use App\Models\Contact;  // Il tuo modello Contact
use Exception;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Valida i dati del form
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'content' => 'required|string'
        ]);

        try {
            // Crea un nuovo contatto nel database
            $contact = Contact::create($validatedData);

            // Invia l'email usando la Mailable
            Mail::to('your-real-email@mailtrap.io') // Inserisci il tuo indirizzo Mailtrap corretto
                ->send(new ContactMail($contact));

            // Ritorna una risposta di successo
            return response()->json(['message' => 'Email inviata con successo!']);

        } catch (Exception $e) {
            // Gestione degli errori durante l'invio dell'email
            return response()->json(['error' => 'Errore durante l\'invio dell\'email: ' . $e->getMessage()], 500);
        }
    }
}
