@extends('layout')

@section('page-title')
    <title>Kodu</title>
    @stop
    @section('page-specific-stuff')
            <!-- Diagram -->
    <link href="libs/morris.js/morris.css" rel="stylesheet">
    <!-- Datepicker -->
    <link href="css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">

    <!-- Kella valik -->
    <script src="js/bootstrap-clockpicker.js"></script>
    <script src="libs/raphael/raphael-min.js"></script>
    <script src="libs/morris.js/morris.min.js"></script>


    <!-- Kella valik -->
    <script src="js/bootstrap-clockpicker.js"></script>


@stop

@section('content')
    <div class="home-heading">


        <div class="row">


            <div class="col-sm-6 col-sm-offset-3" id="home-dates">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="/home">
                    {!! csrf_field() !!}

                    <div class="row vertical-align">
                        <h1 class="col-xs-8">
                            Millal ma magama läksin:
                        </h1>
                        <div class="col-xs-2 input-group clockpicker">
                            <label for="went-to-sleep" class="visuallyhidden">Magamamineku aeg</label>
                            <input id="went-to-sleep" type="text" class="form-control" value="22:45" name="went_to_sleep">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                        </div>
                    </div>

                    <div class="row vertical-align">
                        <h1 class="col-xs-8">
                            Millal ma üles tõusin:
                        </h1>
                        <div class="col-xs-2 input-group clockpicker">
                            <label for="woke-up-at" class="visuallyhidden">Woke up at</label>
                            <input id="woke-up-at" type="text" class="form-control" value="7:15" name="woke_up_at">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                        </div>
                    </div>

                    <button type="submit" id="home-submit" class="button btn center-block">Sisesta</button>
                </form>
            </div>

        </div>

    </div>

    <br>

    <section id="content">

        <div class="row">

            <!-- ****************************** Content ************************** -->
            <div class="col-sm-8 col-sm-offset-2">

                <section id="stat-content">

                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="">
                                <div class="bar-panel-header">
                                    <h2>Jooksev nädal</h2>

                                </div>
                                <!-- /.panel-heading -->
                                <div class="bar-panel-body">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>

                    </div>
                    <!-- /.row -->
                    <!-- /#page-wrapper -->

                </section>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'right',
            autoclose: 'true',
            donetext: 'Valmis'
        });
    </script>

    @include('Charts.home')

@stop
