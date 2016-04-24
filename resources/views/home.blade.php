@extends('layout')

@section('html')
    <html lang="et">
    @stop

    @section('page-title')
        <title>Kodu</title>
        @stop
        @section('page-specific-stuff')
                <!-- Diagram -->
        <!-- Datepicker -->
        <link href="css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">

        <!-- Kella valik -->
        <script src="js/bootstrap-clockpicker.js" defer></script>
        <script src="js/Chart.min.js" defer></script>
        <script src="js/Chart.StackedBar.js" defer></script>
        <!-- Kella valik -->
        <script src="js/bootstrap-clockpicker.js" defer></script>

        <script src="js/charts.js" defer></script>
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
                    <form method="POST" action="/home" id="chart" data-chart="{{$json}}">
                        {!! csrf_field() !!}

                        <div class="row vertical-align">
                            <h1 class="col-xs-8">
                                Millal ma magama läksin:
                            </h1>
                            <div class="col-xs-2 input-group clockpicker">
                                <label for="went-to-sleep" class="visuallyhidden">Magamamineku aeg</label>
                                <input id="went-to-sleep" type="text" class="form-control" value="22:45"
                                       name="went_to_sleep">
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

                        <div class="loader-wrapper">
                            <button type="submit" id="home-submit" class="button btn">Sisesta</button>
                            <span id="dvloader"><img src="img/ajax-loader.gif" alt="loader"/></span>
                        </div>
                    </form>


                    <div id="pop" class="messagepop pop">
                        <div class="pop-header">
                            <button type="button" class="close" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="pop-body">
                            <form method="post" id="extraHours" action="/messages">
                                <div class="form-group">
                                    <label for="addHour" class="visuallyhidden">Add sleep</label>
                                    <input type="text" class="form-control" name="addHour" id="addHour"
                                           placeholder="Lisa und" required>
                                </div>
                                {{--<p><input type="submit" value="Send Message" name="commit" id="message_submit"/> or <a class="close" href="/">Cancel</a></p>--}}
                                <button id="submit" class="btn btn-success btn-block">Lisa</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <br>

        <div id="content">

            <div class="row">

                <!-- ****************************** Content ************************** -->
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bar-panel-header">
                                <h2>Jooksev nädal</h2>

                            </div>
                            <!-- /.panel-heading -->
                            <div class="bar-panel-body">

                                <canvas id="canvas" height="170" width="400"></canvas>
                            </div>

                            <!-- /.panel-body -->
                        </div>

                    </div>
                    <!-- /.row -->
                    <!-- /#page-wrapper -->
                </div>
            </div>
        </div>
@stop
