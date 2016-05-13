@extends('layouts.template')
@section('content')
    <div class="container">
        <h1>Meus Kanbans</h1>
        @foreach($projects as $project)
            <div class="coluna_x3">
                <a href="{{ url('/projects/'. $project->id) }}">
                    <div class="kanban">
                        <div class="titulo"><h3>{{ $project->name }}</h3></div>
                        <div class="main">
                            <div class="afazer">A fazer: {{ $project->do }}</div>
                            <div class="fazendo">Fazendo: {{ $project->doing }}</div>
                            <div class="feito">Feito: {{ $project->done }}</div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="text-center">
            {!! $projects->render() !!}
        </div>
    </div>
@endsection