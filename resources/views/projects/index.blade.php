@extends('layouts.projects')
@section('content')
    <h1 class="text-center ">I miei progetti</h1>
    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Tecnologie</th>
                <th scope="col">GitHub</th>
                <th scope="col">Stato</th>
                <th scope="col">Dettagli</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr class="table-primary">
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        @foreach (json_decode($project->technologies, true) as $technology)
                            <p>{{ $technology }}</p>
                        @endforeach

                    </td>
                    <td><a href="{{ $project->github_link }}" target="_blank">GitHub</a></td>
                    <td
                        class="{{ $project->status === 'Completato' ? 'table-success' : ($project->status === 'In corso' ? 'table-info' : 'table-warning') }}">
                        {{ $project->status }}
                        @if ($project->status === 'Completato')
                            <i class="fas fa-check-circle" title="Completato"></i>
                        @elseif ($project->status === 'In corso')
                            <i class="fas fa-spinner fa-spin" title="In corso"></i>
                        @elseif ($project->status === 'In attesa')
                            <i class="fas fa-hourglass-half" title="In attesa"></i>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}"> Visualizza</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
