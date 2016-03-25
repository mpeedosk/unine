@extends('layout')

@section('page-title')
    <title>Uni</title>
    @stop
    @section('page-specific-stuff')

            <!-- Datepicker -->
    <link href="css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">

    <!-- Kella valik -->
    <script src="js/bootstrap-clockpicker.js"></script>
@stop
@section('content')
    <section id="content">
        <div class="content-overlay "></div>
        <div class="row">
            <div class="col-md-6 content-left">
                <div class="headings" id="calc-left-a">

                    <h1>Kui läheks kohe magama, </h1>
                    <h1>millal peaksin siis t&otilde;usma?</h1>
                    <div class="arrow"></div>
                    <!--<img class="arrow" src="img/morning.svg">-->
                    <!--<span class="arrow wrapTxt">&#10552;<span class="mask"></span></span>-->
                </div> <!-- alguses näidatud osa -->

                <div class="headings" id="calc-left-b">
                    <div class="container-fluid">
                        <div class="row-fluid time-wrapper">
                            <h2> Ärkamiseks sobivad ajad:</h2>
                            <h1 id="time-text-left-1" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Kaks unetsüklit, 3 tundi und">3</h1>
                            <em class="col-sm-1">või</em>
                            <h1 id="time-text-left-2" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Kolm unetsüklit, 4.5 tundi und">4.30</h1>
                            <em class="col-sm-1">või</em>
                            <h1 id="time-text-left-3" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Neli unetsüklit, 6 tundi und">6</h1>

                            <h1 id="time-text-left-4" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Viis unetsüklit, 7.5 tundi und">7.30</h1>
                            <em class="col-sm-1">või</em>
                            <h1 id="time-text-left-5" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Kuus unetsüklit, 9 tundi und"><strong>9</strong></h1>
                            <em class="col-sm-1">või</em>
                            <h1 id="time-text-left-6" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Seitse unetsüklit, 10.5 tundi und">10.30</h1>
                        </div>

                        <span class="glyphicon glyphicon glyphicon-question-sign"></span>
                        <!--                    <a class="btn btn-calc" id="calc-sleep-now-again">
                                                <em class="ispan glyphicon glyphicon-time"></em>
                                                <span>Arvuta</span><br/>uuesti
                                            </a>-->
                    </div> <!-- peidetud osa -->
                </div>

                <button class="btn-calc button-bot-left" id="calc-sleep-now">
                    <em class="ispan glyphicon glyphicon-time"></em>
                    <span>Arvuta</span><br>
                    <small id="btn-label-left" class="btn-label pull-right">aeg</small>
                </button>

            </div> <!-- vasak pool -->

            <div class="col-md-6 content-right">
                <div class="headings" id="calc-right-a">
                    <h1>Sobiv aeg uinumiseks,</h1>

                    <div id="datepick-fix" class="row vertical-align">
                        <h1 class="col-xs-12 col-md-8">kui t&otilde;usen kell</h1>
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
                            <h2> Uinumiseks sobivad ajad: </h2>
                            <h1 id="time-text-right-1" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Seitse unetsüklit, 10.5 tundi und">3</h1>
                            <em class="col-sm-1">või</em>
                            <h1 id="time-text-right-2" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Kuus unetsüklit, 9 tundi und">4.30</h1>
                            <em class="col-sm-1">või</em>
                            <h1 id="time-text-right-3" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Viis unetsüklit, 7.5 tundi und">6</h1>
                            <h1 id="time-text-right-4" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Neli unetsüklit, 6 tundi und">7.30</h1>
                            <em class="col-sm-1">või</em>
                            <h1 id="time-text-right-5" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Kolm unetsüklit, 4.5 tundi und"><strong>9</strong></h1>
                            <em class="col-sm-1">või</em>
                            <h1 id="time-text-right-6" class="col-sm-3 col-xs-6" data-toggle="tooltip"
                                title="Kaks unetsüklit, 3 tundi und">10.30</h1>
                        </div>
                        <span class="glyphicon glyphicon glyphicon-question-sign"></span>
                    </div>
                </div>
                <button class="btn-calc button-bot-right" id="calc-sleep-later">
                    <em class="glyphicon glyphicon-time"></em>
                    <span>Arvuta</span><br>
                    <small id="btn-label-right" class="btn-label pull-right">aeg</small>
                </button>

            </div>


        </div>

    </section>

    <hr class="medium">

    <!--<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>-->
    <!--  <form action="login.php" method="post" role="form">-->


    <!-- ****************************** Login ************************** -->

    <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="login-panel">
                <div class="panel-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <img src="img/pillow.svg" alt="logo">
                    <h2 class="modal-title" id="modal-login-label">Sisselogimine</h2>
                </div>

                <div class="panel-body">

                    <form method="POST" action="{{ url('/login') }}" class="login-form">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="form-username">Sisestage kasutajatunnus</label>
                            <input id="form-username" type="text" name="username" placeholder="Kasutaja..."
                                   class="form-username form-control" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="form-password">Sisestage salasõna</label>
                            <input type="password" name="password" placeholder="Parool..."
                                   class="form-password form-control" id="form-password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <br>
                        <button type="submit" class="btn center-block ">Logi sisse</button>
                        <hr class="medium">
                        <div class="social-wrapper">
                            <a href="/register" class="register pull-left"> Loo konto</a>
                            <em class="social-label"> või kasuta </em>
                            <div class="social-icons">
                                <a href=""> <img class="social-img" src="img/Fb.svg" alt="Facebook"></a>
                                <a href="/login" class="animsition-link"> <img class="social-img" src="img/gp.svg"
                                                                              alt="Google Plus"></a>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@stop