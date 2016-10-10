<div class="row">
    <div class="col-md-12">
        
            <h3>Informações Pessoais</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-group">
                        <div class="dashboard-field-name">Nome</div>
                        <div class="dashboard-field-value">{{ $user->name }}</div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6">
                    <div class="dashboard-group">
                        <div class="dashboard-field-name">Telefone</div>
                        <div class="dashboard-field-value">{{ $user->phone }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dashboard-group">
                        <div class="dashboard-field-name">Email</div>
                        <div class="dashboard-field-value">{{ $user->email }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn pull-right" type="submit">Alterar</button>
                </div>
            </div>
        
            <h3>Endereço Principal</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="dashboard-group">
                        <div class="dashboard-field-name">CEP</div>
                        <div class="dashboard-field-value">{{ $address->zipCode }}</div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="dashboard-group">
                        <div class="dashboard-field-name">Estado</div>
                        <div class="dashboard-field-value">{{ $address->state }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard-group">
                        <div class="dashboard-field-name">Cidade</div>
                        <div class="dashboard-field-value">{{ $address->city }}</div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-8">
                    <div class="dashboard-group">
                        <div class="dashboard-field-name">Bairro</div>
                        <div class="dashboard-field-value">{{ $address->neighborhood }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard-group">
                        <div class="dashboard-field-name">Complem.</div>
                        <div class="dashboard-field-value">{{ $address->additionalData }}</div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-group">
                        <div class="dashboard-field-name">Endereço</div>
                        <div class="dashboard-field-value">{{ $address->street }}</div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-12">
                    <button class="btn pull-right" type="submit">Alterar</button>
                </div>
            </div>
        </form>
    </div>
</div>