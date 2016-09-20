<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="{{ route('guest.login.post') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Senha</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <!--<div class="form-group">-->
                    <!--    <div class="col-md-6 col-md-offset-4">-->
                    <!--        <div class="checkbox">-->
                    <!--            <label>-->
                    <!--                <input type="checkbox" name="remember"> Remember Me-->
                    <!--            </label>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="divider"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" id="modal-btn" class="btn btn-success pull-right" style="margin-left: 20px;">Entrar</button>
                            <a href="/cadastrar" class="btn btn-primary pull-right">Cadastrar agora</a>

                            <!--<a class="btn btn-link" href="{{ url('/password/reset') }}">-->
                            <!--    Forgot Your Password?-->
                            <!--</a>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>