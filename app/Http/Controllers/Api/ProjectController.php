<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(5); // Restituisce 5 progetti per pagina
        return response()->json($projects);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
    
        if (!$project) {
            return response()->json(['message' => 'Progetto non trovato'], 404); // Restituisce 404
        }
    
        return response()->json($project);
    }

}
