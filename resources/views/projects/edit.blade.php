@extends('layouts.projects')

@section('title', 'Modifica progetto')



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

        {{-- Technologie --}}
        <div class="mb-3">
            <label class="form-label">Inserisci le tecnologie usate:</label>
            <div class="d-flex gap-4 flex-wrap">
                <div>
                    @foreach ($technologies as $technology)
                        <input type="checkbox" id="technology-{{ $technology->id }}" name="technologies[]"
                            value="{{ $technology->id }}"
                            {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                        <label for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                    @endforeach

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
