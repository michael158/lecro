@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Meus KANBANS</h1>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#project-modal">Novo Kanban
                <i
                        class="fa fa-plus"></i></button>
        </div>
        <div id="kanbans_list">
            @foreach($projects as $project)
                <div class="coluna_x3">
                    <span class="pull-right btn-delete">
                        <a href="{{ url('/projects/delete/'. $project->id) }}" class="hide" data-toggle="tooltip" title="deletar"><i class="fa fa-times"></i></a>
                    </span>
                    <a href="{{ url('/projects/'. $project->id) }}">
                        <div class="kanban">
                            <div class="titulo"><h3>{{ $project->name }}</h3></div>
                            <div class="main">
                                <div class="text-center">
                                    <h4>Data de Término</h4>
                                    <h5 style="color: #EA1B1B">{{ App\My\Util::dateFormat($project->finish_date) }}</h5>
                                </div>
                                <div class="afazer">A fazer: {{ $project->do }}</div>
                                <div class="fazendo">Fazendo: {{ $project->doing }}</div>
                                <div class="feito">Feito: {{ $project->done }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="text-center">
            {!! $projects->render() !!}
        </div>
    </div>
    @include('projects.modal.project-modal')
    <script type="text/javascript" src="{{ url('js/plugins/jquery-ui.min.js') }}"></script>
    @include('projects.scripts.index')
@endsection