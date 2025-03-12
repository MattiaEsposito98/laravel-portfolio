@extends('layouts.projects')


@section('title', $project->title)

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        <article>
            <img src="{{ $project->image }}" alt="{{ $project->title }}">
        </article>
        <ul> Tecnologie usate:
            @foreach (json_decode($project->technologies, true) as $technology)
                <li>{{ $technology }}</li>
            @endforeach
        </ul>

        <p>Stato: <strong>{{ $project->status }}</strong></p>
    </div>
@endsection
