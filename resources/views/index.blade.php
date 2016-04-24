@extends('layout')

@section('html')
    @if (Auth::guest())
        <html lang="et">
    @else
        <html lang="et" manifest="uni.appcache">
    @endif
@stop

@section('page-title')
    <title>Uni</title>
    @stop
    @section('page-specific-stuff')

            <!-- Datepicker -->
    <link href="/css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">

    <!-- Kella valik -->
    <script src="/js/bootstrap-clockpicker.js" defer></script>

    @if (count($errors) > 0)
        <script type="text/javascript">
            $(document).ready(function () {
                $("#modal-login").modal('show');
            });
        </script>
    @endif

@stop
@section('content')
    <section id="content">
        <div class="content-overlay "></div>
        <div class="row">
            <div class="col-md-6 content-left">
                <div class="headings" id="calc-left-a">

                    <h1>{{ trans('main.now1') }}</h1>
                    <h1>{{ trans('main.now2') }}</h1>
                    <div class="arrow"></div>
                    <!--<img class="arrow" src="img/morning.svg">-->
                    <!--<span class="arrow wrapTxt">&#10552;<span class="mask"></span></span>-->
                </div> <!-- alguses näidatud osa -->

                <div class="headings" id="calc-left-b">
                    <div class="container-fluid">
                        <div class="row-fluid time-wrapper">
                            <h2> {{ trans('main.now3') }}</h2>
                            <h1 id="time-text-left-1" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.2c') }}">3</h1>
                            <em class="col-sm-1">{{ trans('main.or') }}</em>
                            <h1 id="time-text-left-2" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.3c') }}">4.30</h1>
                            <em class="col-sm-1">{{ trans('main.or') }}</em>
                            <h1 id="time-text-left-3" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.4c') }}">6</h1>

                            <h1 id="time-text-left-4" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.5c') }}">7.30</h1>
                            <em class="col-sm-1">{{ trans('main.or') }}</em>
                            <h1 id="time-text-left-5" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.6c') }}"><strong>9</strong></h1>
                            <em class="col-sm-1">{{ trans('main.or') }}</em>
                            <h1 id="time-text-left-6" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.7c') }}">10.30</h1>
                        </div>

                        <span class="glyphicon glyphicon glyphicon-question-sign" data-toggle="modal"
                              data-target="#left-modal"></span>
                        <!--                    <a class="btn btn-calc" id="calc-sleep-now-again">
                                                <em class="ispan glyphicon glyphicon-time"></em>
                                                <span>Arvuta</span><br/>uuesti
                                            </a>-->

                    </div> <!-- peidetud osa -->
                </div>

                <button class="btn-calc button-bot-left" id="calc-sleep-now">
                    <em class="ispan glyphicon glyphicon-time"></em>
                    <span>{{ trans('main.calc') }}</span><br>
                    <small id="btn-label-left" class="btn-label pull-right">{{ trans('main.time') }}</small>
                </button>

            </div> <!-- vasak pool -->

            <div class="col-md-6 content-right">
                <div class="headings" id="calc-right-a">
                    <h1>{{ trans('main.later1') }}</h1>

                    <div id="datepick-fix" class="row vertical-align">
                        <h1 class="col-xs-12 col-md-8">{{ trans('main.later2') }}</h1>
                        <div class="col-xs-12 col-md-4">
                            <div class="input-group clockpicker">
                                <label for="wakeup-insert" class="visuallyhidden">Went to sleep</label>
                                <input id="wakeup-insert" type="text" class="form-control" value="7.15">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                            </div> <!-- clockpicker lõpp -->
                        </div>
                    </div> <!-- clockpicker rida -->
                    <div class="rightarrow"></div>


                </div>


                <div class="headings" id="calc-right-b">
                    <div class="container-fluid">
                        <div class="row-fluid time-wrapper">
                            <h2> {{ trans('main.later3') }} </h2>
                            <h1 id="time-text-right-1" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.7c') }}">3</h1>
                            <em class="col-sm-1">{{ trans('main.or') }}</em>
                            <h1 id="time-text-right-2" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.6c') }}">4.30</h1>
                            <em class="col-sm-1">{{ trans('main.or') }}</em>
                            <h1 id="time-text-right-3" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.5c') }}">6</h1>
                            <h1 id="time-text-right-4" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.4c') }}">7.30</h1>
                            <em class="col-sm-1">{{ trans('main.or') }}</em>
                            <h1 id="time-text-right-5" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.3c') }}"><strong>9</strong></h1>
                            <em class="col-sm-1">{{ trans('main.or') }}</em>
                            <h1 id="time-text-right-6" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="{{ trans('main.2c') }}">10.30</h1>
                        </div>
                        <span class="glyphicon glyphicon glyphicon-question-sign" data-toggle="modal"
                              data-target="#right-modal"></span>
                    </div>
                </div>
                <button class="btn-calc button-bot-right" id="calc-sleep-later">
                    <em class="glyphicon glyphicon-time"></em>
                    <span>{{ trans('main.calc') }}</span><br>
                    <small id="btn-label-right" class="btn-label pull-right">{{ trans('main.time') }}</small>
                </button>

            </div>


        </div>

    </section>

    <hr class="medium">

    <!--<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>-->
    <!--  <form action="login.php" method="post" role="form">-->


    <!-- ****************************** Login ************************** -->

    <!-- Parempoolne abi -->
    <div class="modal fade" id="right-modal" role="dialog">
        <div class="modal-dialog" id="right-modal-inner">
            <div class="login-panel">
                <div class="panel-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">{{ trans('main.help') }}</h2>
                </div>
                <div class="panel-body">
                    <p>{{ trans('main.rHelp') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Vasakpoolne abi -->
    <div class="modal fade" id="left-modal" role="dialog">
        <div class="modal-dialog" id="left-modal-inner">
            <div class="login-panel">
                <div class="panel-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">{{ trans('main.help') }}</h2>
                </div>
                <div class="panel-body">
                    <p>{{ trans('main.lHelp') }}</p>
                </div>
            </div>
        </div>
    </div>

@stop