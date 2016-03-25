<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sisselogimine</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Social Buttons CSS -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/morning.css" rel="stylesheet">

    <link rel='stylesheet' href='css/animsition.min.css'>


    <script>
        getStylesheet();
    </script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>


</head>

<body class="animsition">
<!-- Login Modal CSS-->

<div class="container">
    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="reg-panel ">
                <div class="panel-header">
                    <button type="button" class="close">
                        <span onclick="goBack()" class="animsition-link" aria-hidden="true">&larr;</span><span
                                class="sr-only">Tagasi</span>
                    </button>
                    <img src="img/pillow.svg" alt="logo">
                    <h3 class="modal-title" id="modal-login-label">Registreerimine
                        <konto></konto>
                    </h3>
                </div>

                <div class="panel-body">

                    <form method="POST" action="{{ url('/register') }}" class="form-horizontal">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                            <label class="col-md-4 control-label">Kasutajatunnus</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Eesnimi</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control" name="first_name"
                                       value="{{ old('first_name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Perenimi</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Meiliaadress</label>

                            <div class="col-md-7">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Salasõna</label>

                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Kinnitage salasõna</label>

                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-4">
                                <div class="checkbox">
                                    <input type="hidden" name="remember" checked>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn center-block ">Loo konto</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
