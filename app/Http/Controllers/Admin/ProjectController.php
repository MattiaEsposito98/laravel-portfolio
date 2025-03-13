<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        $types = Type::all();
        return view('projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->description = $data['description'];
        $newProject->image = $data['image'];
        $newProject->technologies = json_encode($data['technologies']);
        $newProject->type_id = $data['type_id'];
        $newProject->github_link = $data['github_link'];
        $newProject->status = $data['status'];
        // dd($newProject);
        $newProject->save();
        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->type); Qui per leggere i valori dell'entità type da project
        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('projects.edit', compact('project', 'types'));
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
        $project->technologies = $data['technologies'];
        $project->type_id = $data['type_id'];
        $project->github_link = $data['github_link'];
        $project->status = $data['status'];
        $project->update();
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');

        // return 'sei nella destroy';
    }
}
