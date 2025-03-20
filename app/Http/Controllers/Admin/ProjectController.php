<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        // Carica tutti i progetti con le tecnologie associate
        $projects = Project::with('technologies',)->get();
        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        // dd($data);
        // dd($data['technologies']);
        $newProject = new Project();

        $newProject->title = $data['title'];
        $newProject->description = $data['description'];
        $newProject->image = $data['image'];
        $newProject->type_id = $data['type_id'];
        $newProject->github_link = $data['github_link'];
        $newProject->status = $data['status'];

        $newProject->save();

        // Salvare le technologie usando attach
        $newProject->technologies()->attach($data['technologies']);
        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $technologies = $project->technologies;
        // dd($project->type); Qui per leggere i valori dell'entità type da project
        return view("projects.show", compact("project", 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->image = $data['image'];
        // $project->technologies = $data['technologies'];
        $project->type_id = $data['type_id'];
        $project->github_link = $data['github_link'];
        $project->status = $data['status'];

        $project->update();

        // Sincornizziamo i dati della tabella 
        $project->technologies()->sync($request->input('technologies'));
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        // Rimuovi prima le associazioni dalla tabella pivot
        $project->technologies()->detach();

        $project->delete();
        return redirect()->route('projects.index');

        // return 'sei nella destroy';
    }
}
