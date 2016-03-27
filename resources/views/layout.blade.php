<!DOCTYPE html>
<html lang="et">

<head>
    @yield('page-title')
    <link rel="shortcut icon" href="/img/pillow.ico"/>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/morning.css" rel="stylesheet">


    <!-- teine kujundus, kui javascript ei tööta -->
    <noscript>
        <link href="/css/main-noscript.css" rel="stylesheet">
    </noscript>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script>
	if (typeof jQuery == 'undefined') {
		document.write(decodeURI("%3Cscript src='/js/jquery-2.2.2.min.js' type='text/javascript'%3E%3C/script%3E"));
	}
	</script>
    <!-- Sujuv lehekülgede vahetus -->
    <script src="/js/animsition.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
		$.fn.modal || document.write(decodeURI("%3Cscript src='/js/bootstrap.min.js' type='text/javascript'%3E%3C/script%3E"))
		</script>
    <!-- Main script -->
    <script src="/js/main.js"></script>

    <!--valime värviteema vahel-->
    <script>
        getStylesheet();
    </script>

    @yield('page-specific-stuff')

            <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900'
          rel='stylesheet' type='text/css'>

</head>

<body>
<!-- ****************************** Sidebar ************************** -->
<div class="page animsition">
    <nav id="sidebar-wrapper">

        <a id="menu-close" href="#" class="close-btn toggle">SULGE <span
                    class="glyphicon glyphicon-remove-circle"></span></a>
        <ul class="sidebar-nav">

            @if (Auth::guest())
                <li><a href="/" class="animsition-link">Pealeht</a></li>
                <li><a href="/loe_lisaks" class="animsition-link">Loe lisaks</a></li>
            @else
                <li><a href="/home" class="animsition-link">Kodu</a></li>
                <li><a href="/" class="animsition-link">Pealeht</a></li>
                <li><a href="/unelogi" class="animsition-link">Unelogi</a></li>
                <li><a href="/statistika" class="animsition-link">Statistika</a></li>
                <li><a href="/loe_lisaks" class="animsition-link">Loe lisaks</a></li>
                <li><a href="{{ url('/logout') }}">Logi välja</a></li>

            @endif
        </ul>
    </nav>
    <!-- ****************************** Header ************************** -->
    <header id="header">
        <div class="header-wrapper">
            <div class="container-fluid noselect">
                <div class="row">
                    <div class="col-xs-6 col-sm-3 pull-left">
                        <a class="logo" href="/"> <img class="logo-img" src="/img/pillow.svg" alt="logo"></a>
                    </div>
                    <div class="col-sm-6"><h2 class="title">UNI</h2></div>
                    <!--<div class="col-xs-2"><a id="login-toggle" href="#" class="toggle" title="Login" data-toggle="tooltip" data-placement="left"></a>Login</div>
                    -->
                    <div class="col-xs-6 col-sm-3 pull-right">
                        <a id="menu-toggle" href="#" class="toggle" role="button"><img src="/img/menusvg.svg" alt="menu"></a>

                        @if (Auth::guest())
                            <a id="login-toggle" href="login" data-remote="false" data-modal-id="modal-login"
                               title="Login" data-toggle="tooltip"
                               data-placement="left"><span class="glyphicon glyphicon-user"></span></a>
                        @else
                            <span id="user-toggle"> {{ substr(Auth::user()-> first_name,0,1) . "." . substr(Auth::user()-> last_name,0,1) . "."  }} </span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </header>

    <hr class="medium">


    <!-- ****************************** Content ************************** -->

    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <br>
                    <p class="text-muted"></p>
                </div>
            </div>
        </div>
    </footer>

</div>


</body>

</html>
