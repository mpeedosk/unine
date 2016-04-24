@extends('layout')

@section('html')
    <html lang="et">
    @stop

    @section('page-title')
        <title>Unelogi</title>
        @stop

        @section('page-specific-stuff')
                <!-- Datepicker -->
        <link href="/css/datepicker.min.css" rel="stylesheet" type="text/css">
        <script src="/js/datepicker.min.js" defer></script>

        <!-- Include English language -->
        <script src="/js/i18n/datepicker.et.js" defer></script>

        <script src="/js/logs.js" defer></script>

    @stop

    @section('content')
        <div id="content">
            <div class="content-overlay "></div>
            <div class="row">
                <div class="col-xs-12 col-md-7 log-content-left">
                    <form id="log-form" method="POST" action="/unelogi/"
                          data-current-id="{{isset($first) ? $first -> id : "" }}">
                        {{method_field('PATCH')}}
                        {!! csrf_field() !!}
                        <div>
                            <div class="col-md-8">
                                <label for="log-title" class=" visuallyhidden">Sisesta pealkiri</label>
                                <input id="log-title" class="log-text-area" placeholder="Lisa pealkiri" name="title"
                                       required value="{{isset($first) ? $first -> title : "" }}">
                            </div>

                            <div class="col-md-4">
                                <label for="log-date" class="visuallyhidden">Sisesta kuupäev</label>
                                <input id="log-date" class='log-text-area datepicker-here pull-right' data-language='et'
                                       name="date"
                                       value="{{ date('d.m.Y', strtotime(isset($first) ? $first -> date : "" ))}}"
                                       required>
                                <!--      <?php //echo date("d.m.Y"); ?>                      -->
                            </div>
                        </div>
                        <label for="log-text" class="visuallyhidden">Sisesta tekst</label>
                    <textarea id="log-text" class="log-text-area" rows="18" maxlength="1400" name="body"
                              required>{{isset($first) ? $first -> body : "" }}</textarea>
                        <button type="submit" id="log-save" class="button btn">Salvesta</button>

                    </form>


                </div>
                <div class="col-xs-12 col-md-4 log-content-right pull-right">
                    <div class="log-panel panel panel-default">
                        <div class="panel-heading">
                            <span id="dvloader-log"><img src="/img/ajax-loader-log.gif" alt="loader"/></span>Viimased sissekanded
                            (<?php echo $logCount ?>)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="log-panel-body">
                            <div class="list-group endless-pagination" data-next-page="{{ $logs->nextPageUrl() }}">
                                @include('unelogi.ajax.log')
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <form id="new-log" method="POST" action="/unelogi">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn button" id="log-new">Uus sissekanne</button>
                    </form>
                </div>
            </div>
        </div>
@stop