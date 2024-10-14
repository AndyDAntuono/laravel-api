<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all(); // Recupera tutti i progetti
        
        // Fase di controllo con dd
        dd($projects); // Controlla che i dati vengano effettivamente recuperati
        
        return response()->json($projects);
    }
}
