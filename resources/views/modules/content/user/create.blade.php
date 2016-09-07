<div class="alert alert-warning" role="alert">Preencha todos os campos corretamente e confirme para continuar.</div>

<form class="form-horizontal" role="form" method="POST" action="{{ route('guest.create.post') }}">
    {{ csrf_field() }}
    
    @if($errors->any())
      <div class="alert alert-danger" role="alert">
    		<ul>
    			@foreach($errors->all() as $error)
    				<li>{{ $error }}</li>
    			@endforeach
    		</ul>
    	</div>
    @endif
    
    <h3>Informações Pessoais</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon">*</span>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Nome" required="true">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon">*</span>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email" required="true">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon">*</span>
                <input type="tel" value="{{ old('phone') }}" name="phone" class="form-control" placeholder="Telefone" required="true">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon">*</span>
                <input type="password" name="password" class="form-control" placeholder="Senha" required="true">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon">*</span>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar senha" required="true">
            </div>
        </div>
    </div>

    <h3>Endereço</h3>
    <div class="row">
        <div class="col-md-2">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">*</span>
                <input id="user-zipCode" value="{{ old('zipCode') }}" name="zipCode" type="text" class="form-control" placeholder="CEP" required="true">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">*</span>
                <input id="user-state" value="{{ old('state') }}" name="state" type="text" class="form-control" placeholder="Estado" required="true">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">*</span>
                <input id="user-city" value="{{ old('city') }}" name="city" type="text" class="form-control" placeholder="Cidade" required="true">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">*</span>
                <input id="user-neighborhood" value="{{ old('neighborhood') }}" name="neighborhood" type="text" class="form-control" placeholder="Bairro" required="true">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">*</span>
                <input id="user-additionalData" value="{{ old('additionalData') }}" name="additionalData" type="text" class="form-control" placeholder="Complemento">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">*</span>
                <input id="user-street" value="{{ old('street') }}" name="street" type="text" class="form-control" placeholder="Endereço" required="true">
            </div>
        </div>
    </div>
    
    <br/>
    <br/>
    <br/>
    
    <div class="divider"></div>
    
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-lg btn-primary pull-right" type="submit">Registrar</button>
        </div>
    </div>
</form>