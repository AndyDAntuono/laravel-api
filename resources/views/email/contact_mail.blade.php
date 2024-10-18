<h1>Nuovo Messaggio di Contatto</h1>

<p><strong>Nome:</strong> {{ $contact['name'] ?? 'Nome non fornito' }}</p>
<p><strong>Cognome:</strong> {{ $contact['surname'] ?? 'Cognome non fornito' }}</p>
<p><strong>Email:</strong> {{ $contact['email'] ?? 'Email non fornita' }}</p>
<p><strong>Telefono:</strong> {{ $contact['phone'] ?? 'Telefono non fornito' }}</p>
<p><strong>Messaggio:</strong> {{ $contact['content'] ?? 'Nessun messaggio fornito' }}</p>
