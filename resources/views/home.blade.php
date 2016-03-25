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
    <script src="js/currentWeek.js"></script>


    <!-- Kella valik -->
    <script src="js/bootstrap-clockpicker.js"></script>


@stop

@section('content')
<div class="row">

    <div class="col-sm-3">

    </div>

    <!-- ****************************** Content ************************** -->
    <div class="col-sm-6">
        <div class="home-heading">
            <div class="row vertical-align">
                <h1 class="col-xs-8">
                    Millal ma magama läksin:
                </h1>
                <div  class="col-xs-2 input-group clockpicker" >
                    <label for="went-to-sleep" class="visuallyhidden">Went to sleep</label>
                    <input id="went-to-sleep" type="text" class="form-control" value="22.45">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>

            <div class="row vertical-align">
                <h1 class="col-xs-8">
                    Millal ma üles tõusin:
                </h1>
                <div class="col-xs-2 input-group clockpicker" >
                    <label for="woke-up-at" class="visuallyhidden">Woke up at</label>
                    <input id="woke-up-at" type="text" class="form-control" value="7.15">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>

        </div>

        <hr class="medium">

        <section id="stat-content">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Jooksev nädal</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bar Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
    <div class="col-sm-3">

    </div>
</div>

<script type="text/javascript">
    $('.clockpicker').clockpicker({
        placement: 'bottom',
        align: 'right',
        autoclose: 'true',
        donetext: 'Valmis'
    });
</script>
@stop
