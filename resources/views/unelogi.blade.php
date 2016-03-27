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
                <form method="POST" action="/unelogi/store">
                    {!! csrf_field() !!}
                    <div>
                        <div class="col-md-8">
                            <label for="log-title" class=" visuallyhidden">Sisesta pealkiri</label>
                            <input id="log-title" class="log-text-area" placeholder="Lisa pealkiri" name="title" maxlength="15" required >
                        </div>

                        <div class="col-md-4">
                            <label for="log-date" class="visuallyhidden">Sisesta kuupäev</label>
                            <input id="log-date" class='log-text-area datepicker-here pull-right' data-language='et'
                                   name="date" value="<?php echo date("d.m.Y"); ?>" required>
                        </div>
                    </div>
                    <label for="log-text" class="visuallyhidden">Sisesta tekst</label>
                    <textarea id="log-text" class="log-text-area" rows="18" maxlength="1400" name="body" required></textarea>
                    <button type="submit" id="log-save" class="button btn pull-right">Salvesta</button>

                </form>


            </div>
            <div class="col-xs-12 col-md-4 log-content-right pull-right">
                <div class="log-panel panel panel-default">
                    <div class="panel-heading">
                        Viimased sissekanded (<?php echo $logCount ?>)
                    </div>
                    <!-- /.panel-heading -->
                    <div class="log-panel-body">
                        <div class="list-group">
                            {{--                           <a href="#" class="list-group-item">Best dream ever
                                                           <span class="log-list pull-right text-muted small"><em>18.03.16</em></span>
                                                       </a>
                                                       <a href="#" class="list-group-item">Worst dream ever
                                                               <span class="log-list pull-right text-muted small"><em>18.03.16</em>
                                                               </span>
                                                       </a>
                                                       <a href="#" class="list-group-item">Okay dream
                                                               <span class="log-list pull-right text-muted small"><em>18.03.16</em>
                                                               </span>
                                                       </a>
                                                       <a href="#" class="list-group-item">Maksuamet
                                                               <span class="log-list pull-right text-muted small"><em>17.03.16</em>
                                                               </span>
                                                       </a>
                                                       <a href="#" class="list-group-item">Pitsa
                                                               <span class="log-list pull-right text-muted small"><em>16.03.16</em>
                                                               </span>
                                                       </a>
                                                       <a href="#" class="list-group-item">9/11
                                                               <span class="log-list pull-right text-muted small"><em>15.03.16</em>
                                                               </span>
                                                       </a>
                                                       <a href="#" class="list-group-item">Melt
                                                               <span class="log-list pull-right text-muted small"><em>10.03.16</em>
                                                               </span>
                                                       </a>
                                                       <a href="#" class="list-group-item">Steel beams
                                                               <span class="log-list pull-right text-muted small"><em>05.03.16</em>
                                                               </span>
                                                       </a>--}}
                            @foreach($logs as $log)
                                <a href="/unelogi/{{$log->id}}" class="list-group-item"> {{$log -> title}}

                                    <span class="log-list pull-right text-muted small"><em>{{date('d.m.Y', strtotime($log    -> date))}}</em>
                                    </span>
                                </a>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-default btn-block">Vaata vanemaid</button>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <a href="/unelogi" class="btn button" id="log-new">Uus sissekanne</a>
            </div>


        </div>
    </div>
@stop