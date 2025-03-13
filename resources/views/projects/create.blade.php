@extends('layouts.projects')

@section('title', 'Nuovo progetto')



@section('content')
    <form class="border border-primary p-2 m-2" action="{{ route('projects.store') }}" method="post">
        @csrf
        {{-- Titolo --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo del progetto</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" name="description"> </textarea>
        </div>

        {{-- Imagine --}}
        <div class="mb-3">
            <label for="image" class="form-label">Inserisci url per l'immagine</label>
            <input type="text" class="form-control" id="image" name="image">
        </div>

        {{-- Technologie --}}
        <div class="mb-3">
            <label class="form-label">Inserisci le tecnologie usate:</label>
            <div class="d-flex gap-3">
                <div>
                    <input type="checkbox" id="laravel" name="technologies[]" value="Laravel">
                    <label for="laravel">Laravel</label>
                </div>
                <div>
                    <input type="checkbox" id="react" name="technologies[]" value="React">
                    <label for="react">React</label>
                </div>
                <div>
                    <input type="checkbox" id="vue" name="technologies[]" value="Vue.js">
                    <label for="vue">Vue.js</label>
                </div>
                <div>
                    <input type="checkbox" id="node" name="technologies[]" value="Node.js">
                    <label for="node">Node.js</label>
                </div>
                <div>
                    <input type="checkbox" id="php" name="technologies[]" value="PHP">
                    <label for="php">PHP</label>
                </div>
                <div>
                    <input type="checkbox" id="mysql" name="technologies[]" value="MySQL">
                    <label for="mysql">MySQL</label>
                </div>
                <div>
                    <input type="checkbox" id="JavaScript" name="technologies[]" value="JavaScript">
                    <label for="JavaScript">JavaScript</label>
                </div>
                <div>
                    <input type="checkbox" id="Bootstrap" name="technologies[]" value="Bootstrap">
                    <label for="Bootstrap">Bootstrap</label>
                </div>
            </div>
        </div>

        {{-- Type --}}
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <select name="type_id" id="type_id">

                @foreach ($types as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Github --}}
        <div class="mb-3">
            <label for="github_link" class="form-label">Link per Github</label>
            <input type="text" class="form-control" id="github_link" name="github_link">
        </div>

        {{-- status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Stato del progetto</label>
            <input type="text" class="form-control" id="status" name="status">
        </div>
        <input class="btn btn-primary" type="submit" value="Salva">
    </form>
@endsection
