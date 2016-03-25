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
    <div class="col-md-6 col-md-offset-3">

        <div class="login-panel ">
            <div class="panel-header">
                <button type="button" class="close">
                    <span onclick="goBack()" class="animsition-link" aria-hidden="true">&larr;</span><span class="sr-only">Tagasi</span>
                </button>
                <img src="img/pillow.svg" alt="logo">
                <h3 class="modal-title" id="modal-login-label">Sisselogimine</h3>
            </div>

            <div class="panel-body">

                <form method="POST" action="{{ url('/login') }}" class="login-form">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}" >
                        {!! csrf_field() !!}
                        <label for="form-username">Sisestage kasutajatunnus</label>
                        <input type="text" name="username" placeholder="Kasutaja..." class="form-username form-control" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="form-password">Sisestage salasõna</label>
                        <input type="password" name="password" placeholder="Parool..."
                               class="form-password form-control">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                    <input type="hidden" name="remember" checked>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn center-block ">Logi sisse</button>
                    <hr class="medium">
                    <div class="social-wrapper">
                        <a class="register pull-left"> Loo konto</a>
                        <em class="social-label"> või kasuta </em>
                        <div class="social-icons">
                            <a href=""> <img class="social-img" src="img/Fb.svg" alt="Facebook"></a>
                            <a href="login" class="animsition-link"> <img class="social-img" src="img/gp.svg"
                                                                          alt="Google Plus"></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


</body>

</html>
