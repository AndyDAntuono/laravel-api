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