@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{ url('css/plugins/gridster.min.css') }}">
    <div class="container">
        <div class="row">
            <h1>{{$project['name']}}</h1>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#postit-modal">Novo <i
                        class="fa fa-plus"></i></button>
        </div>
        <div class="row project">
            <div id="do">
                <div class="col-lg-4 father" data-col="1">
                    <div class="panel panel-default">
                        <div class="panel-heading">A Fazer <i class="fa fa-list"></i></div>
                        <div class="panel-body">
                            <div class="drag" style="min-height: 300px">
                                @foreach($project['do'] as $do)
                                    <div class="postit" data-id="{{$do['id']}}">
                                        <div class="title">
                                            <h4>{{$do['title']}}</h4>
                                        </div>
                                      @if(!empty($do['description']))
                                            <div class="content">
                                                {{ $do['description'] }}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="doing">
                <div class="col-lg-4 father" data-col="2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Fazendo <i
                                    class="fa {{ !empty($project['doing']) ? 'fa-spin' : null  }} fa-circle-o-notch"></i>
                        </div>
                        <div class="panel-body">
                            <div class="drag" style="min-height: 300px">
                                @foreach($project['doing'] as $doing)
                                    <div class="postit" data-id="{{$doing['id']}}">
                                        <div class="title"><h4>{{$doing['title']}}</h4></div>
                                        @if(!empty($doing['description']))
                                            <div class="content">
                                                {{ $doing['description'] }}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="done">
                <div class="col-lg-4 father" data-col="3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Terminado <i class="fa fa-check"></i></div>
                        <div class="panel-body">
                            <div class="drag" style="min-height: 300px">
                                @foreach($project['done'] as $done)
                                    <div class="postit" data-id="{{$done['id']}}">
                                        <div class="title"><h4>{{$done['title']}}</h4></div>
                                        @if(!empty($done['description']))
                                            <div class="content">
                                                {{ $done['description'] }}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('projects.modal.postit-modal')
    <script type="text/javascript" src="{{ url('js/plugins/jquery-ui.min.js') }}"></script>
    @include('projects.scripts.show')

@endsection