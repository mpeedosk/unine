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
                    <button type="submit" class="btn button center-block ">Logi sisse</button>
                    <hr class="medium">
                    <div class="social-wrapper">
                        <a href="/register" class="register pull-left"> Loo konto</a>
                        <em class="social-label"> või kasuta </em>
                        <div class="social-icons">
                            <a href="auth/facebook"> <img class="social-img" src="img/Fb.svg" alt="Facebook"></a>
                            <a href="/login" class="animsition-link"> <img class="social-img" src="img/gp.svg"
                                                                           alt="Google Plus"></a>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
