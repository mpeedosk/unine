@extends('layout')

@section('page-title')
    <title>Unelogi</title>
    @stop
    @section('page-specific-stuff')
            <!-- Datepicker -->
    <link href="/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="/js/datepicker.min.js"></script>

    <!-- Include English language -->
    <script src="/js/i18n/datepicker.et.js"></script>
    @stop
@section('content')
    <div id="content">
        <div class="content-overlay "></div>
        <div class="row">
            <div class="col-xs-12 col-md-7 log-content-left">
                <form method="POST" action="/unelogi/{{$log->id}}/edit">
                    {!! csrf_field() !!}
                    <div>
                        <div class="col-md-8">
                            <label for="log-title" class=" visuallyhidden">Sisesta pealkiri</label>
                            <input class="log-text-area" placeholder="Lisa pealkiri" name="title"
                                   value="{{$log-> title}}">
                        </div>

                        <div class="col-md-4">
                            <label for="log-date" class="visuallyhidden">Sisesta kuupäev</label>
                            <input class='log-text-area datepicker-here pull-right' data-language='et'
                                   placeholder="Vali kuupäev" name="date"
                                   value="{{date('d.m.Y', strtotime($log-> date))}}">
                        </div>
                    </div>
                    <label for="log-text" class="visuallyhidden">Sisesta tekst</label>
                    <textarea id="log-text" class="log-text-area" rows="17" maxlength="1400" name="body">{{$log->body }}</textarea>
                    <button type="submit" id="log-save" class="btn pull-right">Salvesta</button>

                </form>

            </div>
            <div class="col-xs-12 col-md-4 log-content-right pull-right">
                <div class="log-panel panel panel-default">
                    <div class="panel-heading">
                        Viimased sissekanded
                    </div>
                    <!-- /.panel-heading -->
                    <div class="log-panel-body">
                        <div class="list-group">
                            @foreach($logs->reverse() as $log)
                                <a href="{{$log->id}}" class="list-group-item"> {{$log -> title}}

                                    <span class="log-list pull-right text-muted small"><em>{{date('d.m.Y', strtotime($log    -> date))}}</em>
                                    </span>
                                </a>
                            @endforeach
                        </div>
                        <!-- /.list-group -->
                        <a href="#" class="btn btn-default btn-block">Vaata vanemaid</a>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <a href="/unelogi" class="btn-l btn" id="log-new" >Uus sissekanne</a>

            </div>


        </div>
    </div>
@stop