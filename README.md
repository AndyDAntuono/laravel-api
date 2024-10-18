NB: dal momento che il seguente esercizio prevede la creazione di due repo che lavorino assieme, copierò ed incollerò il test di questio README.md anche nell'altra repo, in questo caso vue-boolfolio

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
[Milestone 3]
- creo un repo separata intitolata vite-boolfolio seguendo i seguenti passaggi (più che altro li scrivo come promemoria personale):
    - dal terminale di VSC lancio il comdando npm create vite@latest vite-boolfolio -- --template Vue
    - lancio il comando cd vite-boolfolio
    - lancio il comando npm install
    - lancio il comando run dev
    - lancio il comando npm install axios
    - lancio il comando npm add -D sass
    - lancio il comando npm i bootstrap
    - cancello il file style.css 
    - cancello import './style.css' dal file main.js 
    - creo la cartella scss e al suo interno creo il file generals.scss (dove verranno le classi css pià generiche)
    - cancello il file HelloWord.vue dalla cartella components
    - resetto il codice di App.vue
- pubblico vue-boolfolio su github come repo separata da laravel-api
[Milestone 4]
- modifico App.vue per fare una chiamata API all'endpoint del progetto Laravel (ignorare il punto successivo poiché quando ho creato il file ProjectCard.vue non avevo effettuato tutti i controlli per la milestone 4)
- ad un certo punto non avevo più alcun riscontro visivo, ma apparentemente mi è bastato riavviare php artisan serv e npm run dev su laravel-api e un ALTRO npm run dev vite-boolfolio. Infati in quest'ultimo caso è uscito il seguente messaggio: Re-optimizing dependencies because lockfile has changed.
[Milestone 5]
- creo il file ProjectCard.vue e lo compilo e modifico di conseguenza anche App.vue.
- a parte questa modifica al file README.md non si vedrà alcun cambiamento nei push poiché ho per sbaglio completato la milestone 5 cercando risolvere il problema dell'output visivo della milestone 4. Quindi se ci sono stati troppi pochi push è per via della mia distrazione.
[Esecuzione Bonus]
- modifica il controller Api/ProjectController per restituire i progetti con paginazione.
- al momento i pulsanti Precedente e Successiva apparentemente non fuonzionano perché al momento risultano solo Progetto 1 e Progetto 2 he sono i due progetti di default risalenti alla repo di laravel-auth
- per sicurezza ho creato altri 4 a caso poiché il contatore della paginazione conta 5 progetti e superata questo numero, viene creata una nuova pagina dal sesto progetto in poi. Il test ha avuto esito positivo poiché effetivamente si aperta un nuoba pagina per il sesto progetto nella App.vue di vite-boolfolio.

______________________________________________________________________________________________________________________________________________________________________________________________

NB 16-10-24: dal momento che per l'esercizio del 16-10-24 devo lavorare contemporaneamente con due repo (laravel-api e vue-boolfolio) scriverò sia la consegna che soluzione dell'esercizio in  entrambe le repo per sicurezza

/*CONSENGA DEL 16-10-24*/

Continuate a lavorare sulle repo aperte ieri. Create la rotta nel progetto vite boolfolio per visualizzare la pagina di dettaglio di un singolo progetto. Per visualizzare i suoi dati ricordatevi che dovete fare anche un endpoint nel progetto laravel che li recupera tramite lo slug.
Bonus: realizzare una pagina Not Found da far comparire quando si cerca di accedere ad una pagina che non esiste

/*SOLUZIONE DEL 16-10-24*/

[aggiornamento del backend/larave/laravel-api]
- nel file api-php aggiungo una rotta che permetta di recuperare i dettagli di un progetto tramite lo slug.
- aggiungo il metodo show nel controller ProjectController (quello che gestisce le API) per gestire la richiesta dello slug.
- per verificare che le due precedenti operazioni abbiano un esito positivo, utilizzo ThunderClient per testare l'endpoint, poiché questi dovrebbe restituire correttamente i dettagli di un  progetto.
    - ho inserito l'indirizzo http://localhost:8000/api/projects/progetto-1 in thunderclient, il quale mi restituisce i seguenti dati:
        {
            "id": 1,
            "title": "Progetto 1",
            "slug": "progetto-1",
            "image": null,
            "description": "Descrizione del progetto 1",
            "created_at": "2024-10-14T15:07:45.000000Z",
            "updated_at": "2024-10-14T15:07:45.000000Z",
            "type_id": null
        } 
    - ciò significa che il test ha avuto un esito positivo

[aggiornamento del frontend/vue/vue-boolfolio]

- nel file router.js, aggiungo una rotta dinamica per la pagina di dettaglio dei progetti. 
- crea il file ProjectDetail.vue nella cartella components per visualizzare i dettagli del progetto.
- modifico Portfolio.vue aggiungendo un link per ogni progetto in modo che porti alla pagina di dettaglio tramite un ciclo v-for.

[wesecuzione bonus]
- creo il componente NotFound.vue per la pagina Not Found da visualizzare quando l'utente accede a una rotta non esistente.
- avendo riletto la consegna capisco che ottenere il risultato desiderato devo prima modificare ill metodo show nel ProjectController per gestire errori 404
- modifico il componente ProjectDetail.vue per gestire l'errore quando lo slug non corrisponde a un progetto e, in quel caso, mostrare il componente NotFound.
- modifico il componente ProjectDetail.vue per gestire l'errore quando lo slug non corrisponde a un progetto e, in quel caso, mostrare il componente NotFound.
- dopo vari tentativi ho ottenuto il seguente risultato: nella pagina di Portfolio.vue ora c'è una barra della ricerca. Se l'utente cerca un progetto esistente, viene "trasportato" nella pagina dettaglio di suddetto progetto. Invece se l'utente cerca un progetto inesistente, egli otterà la pagina notfound.


______________________________________________________________________________________________________________________________________________________________________________________________

/*CONSEGNA DEL 17-10-24*/

continuate a lavorare sulle repo dei giorni scorsi implementando l'invio delle mail. Ripercorrete i passaggi visti a lezione, un passo alla volta. Aiutatevi con le slides e la documentazione.
Bonus 1: Visualizzare i messaggi  di errore.
Bonus 2: Visualizzare un messaggio di avvenuto invio della mail.
Bonus 3: Reindirizzare ad una thank you page apposita
Bonus 4: Personalizzare la mail con altri stili.

/*SOLUZIONE DEò 17-10-24*/

[fase preliminare]
- mi iscrivo a mailtrap.io
- vado su Email Testing
- vado su Inoxes
- nella scheda My Inbox,  vado nella sezione integration e poi su Code Samples
- apro il menu a tendina accanto alla voce cURL e seleziono PHP: Laravel 9+
- copio i seguenti dati:
    # Looking to send emails in production? Check out our Email API/SMTP product!
    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=2004c1cf939539
    MAIL_PASSWORD=********5653
- sovrascrivo i dati precedenti con i loro simili nel file env, tranne le ultime due voci, ovvero: 
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
- lancio il comando composer require guzzlehttp/guzzle che sarà usato per gestire le richieste HTTP, incluso l'invio di email tramite un'API esterna.
- lancio il comando php artisan make:migration create_contacts_table per creare una tabella per i contatti, ovvero 2024_10_18_152654_create_contacts_table.php
- modifico 2024_10_18_152654_create_contacts_table.php e lancio il comando php artisan migrate
- lancio il comando php artisan make:model Contact per creare l'omonimo modello
- modifico il modello Contact secondo i miei bisogni
- crea un Mailable con il comando php artisan make:mail ContactMail. Modifico quest'ultimo secondo i miei bisogni e cambio il dato di default delle voce MAIL_FROM_ADDRESS del file .env in "info@boolfolio.com"
- apporto delle piccole migliorie in Contact.php e ContactMail.php
- aggiungo il file contact.blade.php per creare il template dell'email in resources/views/emails/contact.blade.php.