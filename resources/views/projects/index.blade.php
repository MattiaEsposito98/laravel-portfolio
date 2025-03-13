@extends('layouts.projects')
@section('content')
    <h1 class="text-center ">I miei progetti</h1>
    <table class="table table-info">
        <thead>
            <tr class="text-center">
                <th scope="col">Titolo</th>
                {{-- <th scope="col">Descrizione</th> --}}
                <th scope="col">Tecnologie</th>
                <th scope="col">Tipo </th>
                <th scope="col">GitHub</th>
                <th scope="col">Stato</th>
                <th scope="col">Dettagli</th>
                <th scope="col">Modifica</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr class="table-primary text-center ">
                    <td>{{ $project->title }}</td>
                    <td>
                        @foreach (json_decode($project->technologies, true) as $technology)
                            <p>{{ $technology }}</p>
                        @endforeach

                    </td>
                    <td>{{ $project->type }}</td>
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
                        {{-- <a href="{{ route('projects.show', $project->id) }}"> Visualizza</a> --}}
                        <a class="btn btn-outline-info" href="{{ route('projects.show', $project->id) }}">Visualizza</a>

                    </td>
                    <td>
                        <div class="d-flex justify-content-around gap-1">
                            <a class="btn btn-outline-warning" href="{{ route('projects.edit', $project) }}">Modifica</a>

                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Elimina
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach



        </tbody>
    </table>
    <a href="{{ route('projects.create') }}" class="btn btn-outline-primary">Crea Nuovo Progetto</a>
@endsection

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Vuoi eliminare il progetto?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Cliccando su conferma eliminerai il progetto
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('projects.destroy', $project) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-outline-danger" value="Elimina">
                </form>
            </div>
        </div>
    </div>
</div>
