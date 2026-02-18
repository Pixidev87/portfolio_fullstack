<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    # PUBLIKUS: Az összes projekt listázása a React frontendnek.
    public function index(): AnonymousResourceCollection
    {
        # Eager loading a technológiákra, hogy elkerüljük az N+1 problémát.
        $projects = Project::with('technologies')->latest()->get();
        # A ProjectResource segítségével alakítjuk át a modelleket API válaszokká.
        return ProjectResource::collection($projects);
    }

    # PUBLIKUS: Egy konkrét projekt részletei (slug alapján).
    public function show(Project $project): ProjectResource
    {
        # Betöltjük a projektet a kapcsolódó technológiákkal együtt, és visszaadjuk a ProjectResource formátumban.
        return new ProjectResource($project->load('technologies'));
    }

    # ADMIN: Új projekt mentése (Sanctummal védve a routeban)
    public function store(StoreProjectRequest $request): JsonResponse
    {
        # A StoreProjectRequest automatikusan elvégzi a validációt, így itt már csak a validált adatokat használjuk.
        $validated = $request->validated();
        # Ha van kép feltöltve, akkor elmentjük a storage-ba és a URL-jét hozzáadjuk a validált adatokhoz.
        if( $request->hasFile('image') ) {
            $path = $request->file('image')->store('projects', 'public');
            $validated['image_url'] = Storage::url($path);
        }
        # Létrehozzuk a projektet az adatbázisban a validált adatokkal.
        $project = Project::create($validated);

        # Visszaadunk egy JSON választ a létrehozott projekttel, és egy üzenettel, hogy sikeres volt a művelet. A HTTP státuszkód 201 Created.
        return response()->json([
            'message' => 'Projekt sikeresen létrehozva',
            'data' => new ProjectResource($project->load('technologies'))
         ], 201);
    }


}
