<nav class="navbar navbar-default rl-navbar rl-fixed-navbar rl-shadow-1">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img class="rl-logo" src="{{ asset('assets/img/logo/rl-logo-white.png') }}"></img></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <form id="search-form" class="navbar-form navbar-left">
          <div class="input-group navbar-search">
            <input id="search-query" type="text" class="form-control" placeholder="Procurar...">
            <span class="input-group-btn">
              <button id="search-btn" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </span>
          </div><!-- /input-group -->
        </form>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li>
            <a class="rl-navbar-btn" href="#">
              <span class="rl-navbar-btn">{{ mb_strimwidth(Auth::user()->name, 0, 30, ".") }}</span>
            </a>
          </li>
          <li>
            <a class="rl-navbar-btn" href="/logout">
              Sair&nbsp;&nbsp;
              <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </a>
          </li>
        @else
          <li>
            <a class="rl-navbar-btn" href="#login-modal" data-toggle="modal" data-target="#login-modal">
              Acessar&nbsp;&nbsp;
              <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </a>
          </li>
          <li>
            <a class="rl-navbar-btn" href="{{ route('guest.create') }}">
              Cadastrar&nbsp;&nbsp;
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </a>
          </li>
        @endif
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="rl-fixed-navbar-space"></div>

@if (Auth::guest())
  <!-- Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
          @if($errors->has('email'))
            <div class="alert alert-danger modal-dialog modal-sm" role="alert">
          		<ul>
          			@foreach($errors->all() as $error)
          				<li>{{ $error }}</li>
          			@endforeach
          		</ul>
          	</div>
          @endif
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        
        <form method="post" action="{{ route('guest.login.post') }}">
          {{ csrf_field() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Acessar minha conta</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12" style="margin-bottom: 8px">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required />
              </div>
              <div class="col-md-12">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" placeholder="Senha" required />
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <a href="#em-breve" class="pull-left">Esqueci minha senha</a>
                
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="/cadastrar" class="btn btn-primary pull-left">Cadastrar agora</a>
            <button type="submit" id="modal-btn" class="btn btn-success">Entrar</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>

  @push('posscripts')
    <script>
    @if($errors->has('email'))
      $(function() {
        $('#login-modal').modal('show');
      });
    @endif
    </script>
  @endpush
@endif

