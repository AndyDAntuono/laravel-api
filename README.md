/*CONSEGNA*/

Esercizio di oggi: Laravel Boolfolio - API
Ciao ragazzi, continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo. L’esercizio di oggi è suddiviso in milestone ed è importante che ne seguiate l’ordine.
Milestone 1 nome repo 1: laravel-api Aggiungiamo al nostro progetto Laravel una nuovo Api/ProjectController. Questo controller risponderà a delle richieste via API e si occuperà di restituire la lista dei progetti presenti nel database in formato json.
Milestone 2 Testiamo la chiamata API tramite Postman e assicuriamoci di ricevere i dati correttamente.
Milestone 3 nome repo 2: vite-boolfolio Iniziamo ad occuparci della parte front-office della nostra applicazione: creiamo un nuovo progetto Vue 3 con Vite e installiamo axios. Colleghiamo questo progetto ad una repo separata.
Milestone 4 Nel componente principale della nostra Vue App facciamo una chiamata API all’endpoint costruito nel progetto Laravel (milestone 1) e recuperiamo tutti i progetti dal nostro back-end. Stampiamo in console i risultati e verifichiamo di ricevere i dati correttamente.
Milestone 5 Creiamo un nuovo componente ProjectCard, che corrisponde ad una card per visualizzare un progetto. Utilizziamo questo componente per visualizzare tutti i progetti ricevuti tramite API.
Bonus: Gestire la paginazione dei risultati

/*SOLUZIONE*/

[Milestone 1]
- Per prima cosa lancio il comando php artisan make:controller Api/ProjectController per un controller che gestisca le chiamata api
    - aggiorno il controller modificando il metodo index per restituire i progetti in formato JSON.
    - uso un nell'index per verificare che i dati vengano recuperati correttamente dal database.
[Milestone 2]
- Definisco la rotta API nel file routes/api.php scrivendo nello stesso file quanto segue:
    Route::get('/projects', [App\Http\Controllers\Api\ProjectController::class, 'index']);
- Testare l'endpoint (http://localhost:8000/api/projects) con Thunderclient assicurarmi che la risposta sia in formato JSON e contenga la lista dei progetti. Inserisco l'endpoint anche nel browser per assicurarmi che mi sia un risultato simile a quello di Thunderclient.
NB: purtroppo ho fatto un push solo per la milestone 1 e 2 perché mi sono lasciato prendere la mano dai test di controllo.... :-P