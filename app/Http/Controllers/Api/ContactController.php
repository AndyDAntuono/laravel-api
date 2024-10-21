<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;
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
            Mail::to('sandbox.smtp.mailtrap.io') // Qui se ho capito bene devo usare il mio indirizzo Mailtrap
                ->send(new ContactMail($contact));

            // Ritorna una risposta di successo con codice HTTP 200
            return response()->json(['message' => 'Email inviata con successo!'], 200);

        } catch (Exception $e) {
            // Gestione degli errori e restituisce una risposta JSON con codice 500
            return response()->json(['error' => 'Errore durante l\'invio dell\'email: ' . $e->getMessage()], 500);
        }
    }
}