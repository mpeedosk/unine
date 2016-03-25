@extends('layout')

@section('page-title')
    <title>Statistika</title>
    @stop

    @section('page-specific-stuff')
            <!-- Morris Charts CSS -->
    <link href="libs/morris.js/morris.css" rel="stylesheet">

    <!-- Datepicker -->
    <link href="css/datepicker.min.css" rel="stylesheet" type="text/css">

    <!-- Morris Charts JavaScript -->
    <script src="libs/raphael/raphael-min.js"></script>
    <script src="libs/morris.js/morris.min.js"></script>
    <script src="js/currentWeek.js"></script>
    <script src="js/currentYear.js"></script>

    <script src="js/datepicker.min.js"></script>

    <!-- Include English language -->
    <script src="js/i18n/datepicker.et.js"></script>
@stop

@section('content')

    <div class="row">

        <div class="col-sm-3">
            <div class="calendar-wrapper">
                <div class="calendar">
                    <div class="datepicker-here" data-range="true" data-language='et'></div>
                </div> <!-- calendar  -->
            </div>
        </div>

        <!-- ****************************** Content ************************** -->
        <div class="col-sm-6">

            <section id="stat-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Morris.js Charts</h1>
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


                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Area Chart Example
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
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
            <div class="stat-menu">
                <div id="stat-menu-wrapper">
                    <div class="stat-menu-items">
                        <div class="checkbox">
                            <label><input type="checkbox" title="month" value="month">Näita kuu vaadet</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" title="year" value="year">Näita aasta vaadet</label>
                        </div>
                    </div>
                    <hr>

                    <div class="stat-menu-drop">
                        <label for="yearpicker">Vali aasta</label>
                        <select name="yearpicker" id="yearpicker"></select>
                    </div>

                    <div class="stat-menu-drop">
                        <label for="monthpicker">Vali kuu</label>
                        <select name="month" id="monthpicker">
                            <option value="volvo">Terve aasta</option>
                            <option value="saab">Jaanuar</option>
                            <option value="mercedes">Veebruar</option>
                            <option value="audi">Märts</option>
                            <option value="volvo">Aprill</option>
                            <option value="saab">Mai</option>
                            <option value="mercedes">Juuni</option>
                            <option value="audi">Juuli</option>
                            <option value="volvo">August</option>
                            <option value="saab">September</option>
                            <option value="mercedes">Oktoober</option>
                            <option value="audi">November</option>
                            <option value="audi">Detsember</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        for (i = new Date().getFullYear(); i > 2005; i--) {
            $('#yearpicker').append($('<option />').val(i).html(i));
        }
    </script>

@stop