<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;  // Assicurati che questa classe esista
use App\Models\Contact;  // Il tuo modello Contact

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

        // Crea un nuovo contatto nel database
        $contact = Contact::create($validatedData);

        // Invia l'email usando la Mailable
        Mail::to('sandbox.smtp.mailtrap.io') // Mi ero dimenicato di modificare l'indirizzo e-mail
            ->send(new ContactMail($contact));

        // Ritorna una risposta di successo
        return response()->json(['message' => 'Email inviata con successo!']);
    }
}
