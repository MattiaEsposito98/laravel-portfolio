@extends('layouts.projects')

@section('title', 'Nuovo progetto')



@section('content')
    <form class="border border-primary p-2 m-2" action="{{ route('projects.update', $project) }}" method="post">
        @csrf
        @method('PUT')
        {{-- Titolo --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo del progetto</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}">
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" name="description"> {{ $project->description }}</textarea>
        </div>

        {{-- Imagine --}}
        <div class="mb-3">
            <label for="image" class="form-label">Inserisci url per l'immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $project->image }}">
        </div>

        {{-- Technologies --}}
        <div class="mb-3">
            <label class="form-label">Inserisci le tecnologie usate:</label>
            <div class="d-flex gap-3">

                @php
                    $selectedTechnologies = json_decode($project->technologies, true) ?? [];
                @endphp

                <div>
                    <input type="checkbox" id="laravel" name="technologies[]" value="Laravel"
                        {{ in_array('Laravel', $selectedTechnologies) ? 'checked' : '' }}>
                    <label for="laravel">Laravel</label>
                </div>
                <div>
                    <input type="checkbox" id="react" name="technologies[]" value="React"
                        {{ in_array('React', $selectedTechnologies) ? 'checked' : '' }}>
                    <label for="react">React</label>
                </div>
                <div>
                    <input type="checkbox" id="vue" name="technologies[]" value="Vue.js"
                        {{ in_array('Vue.js', $selectedTechnologies) ? 'checked' : '' }}>
                    <label for="vue">Vue.js</label>
                </div>
                <div>
                    <input type="checkbox" id="node" name="technologies[]" value="Node.js"
                        {{ in_array('Node.js', $selectedTechnologies) ? 'checked' : '' }}>
                    <label for="node">Node.js</label>
                </div>
                <div>
                    <input type="checkbox" id="php" name="technologies[]" value="PHP"
                        {{ in_array('PHP', $selectedTechnologies) ? 'checked' : '' }}>
                    <label for="php">PHP</label>
                </div>
                <div>
                    <input type="checkbox" id="mysql" name="technologies[]" value="MySQL"
                        {{ in_array('MySQL', $selectedTechnologies) ? 'checked' : '' }}>
                    <label for="mysql">MySQL</label>
                </div>
                <div>
                    <input type="checkbox" id="JavaScript" name="technologies[]" value="JavaScript"
                        {{ in_array('JavaScript', $selectedTechnologies) ? 'checked' : '' }}>
                    <label for="JavaScript">JavaScript</label>
                </div>
                <div>
                    <input type="checkbox" id="Bootstrap" name="technologies[]" value="Bootstrap"
                        {{ in_array('Bootstrap', $selectedTechnologies) ? 'checked' : '' }}>
                    <label for="Bootstrap">Bootstrap</label>
                </div>
            </div>
        </div>



        {{-- Type --}}
        <div class="mb-3">
            <label for="type" class="form-label">Tipologia</label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Github --}}
        <div class="mb-3">
            <label for="github_link" class="form-label">Link per Github</label>
            <input type="text" class="form-control" id="github_link" name="github_link"
                value="{{ $project->github_link }}">
        </div>

        {{-- status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Stato del progetto</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $project->status }}">
        </div>
        <input class="btn btn-primary" type="submit" value="Salva">
    </form>
@endsection
