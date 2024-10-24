@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Progetto</h1>

    <!-- mostra errori di validazione -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form per modificare il progetto -->
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- metodo HTTP PUT per aggiornare -->

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $project->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control" id="description" rows="3" required>{{ old('description', $project->description) }}" </textarea>
        </div>

        <div class="form-group">
            <label for="image">Immagine attuale</label><br>
            @if($project->image)
             <!-- Mostra l'immagine dal filesystem -->
                <img src="{{ asset('storage/' . $project->image) }}" alt="Immagine del progetto" width="200" height="300"> <!-- lascio queste dimensioni perché userò delle immagini da https://picsum.photos/200/300, stavolta però salvate nel pc e nella cartella storage -->
            @else
                <p>Nessuna immagine caricata</p>
            @endif
        </div>
        <div class="form-group">
            <label for="image">Carica nuova immagine</label>
            <input type="file" name="image" id="image" class="form-control"> <!-- campo per l'upload dell'immagine -->
        </div>
        <div class="form-group">
            <label for="type_id">Tipologia</label>
            <select name="type_id" id="type_id" class="form-control">
                <option value="">Seleziona una tipologia</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="technologies">Technologies</label>
            <div>
                @foreach($technologies as $technology)
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="technologies[]" 
                            id="technology{{ $technology->id }}" 
                            value="{{ $technology->id }}"
                        >
                        <label class="form-check-label" for="technology{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salva modifiche</button>
    </form>
</div>
@endsection