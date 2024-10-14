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