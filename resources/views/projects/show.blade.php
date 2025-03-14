@extends('layouts.projects')

@section('title', $project->title)

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">{{ $project->title }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="{{ $project->image }}" alt="{{ $project->title }}" class="img-fluid rounded shadow"
                                style="max-height: 300px;">
                        </div>
                        <p class="lead">{{ $project->description }}</p>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Tipologia del sito:</strong> {{ $project->type->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Stato:</strong> <span class="badge bg-success">{{ $project->status }}</span>
                            </li>

                            @if (count($technologies) > 0)
                                <li class="list-group-item">
                                    <strong>Tecnologie usate:</strong>
                                    <ul class="mt-2">

                                        @foreach ($technologies as $technology)
                                            <li class="badge me-1" style="background-color: {{ $technology->color }};">
                                                {{ $technology->name }}
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                            @endif


                        </ul>

                        <div class="mt-3 text-end">
                            <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">Torna ai progetti</a>
                            <a href="{{ $project->github_link }}" class="btn btn-dark" target="_blank">Vedi su GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
