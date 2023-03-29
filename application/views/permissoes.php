<div class="card">
    <div class="card-header">
        <h3 class="card-title">Permissões!</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <li class="btn btn-default btn-success"><a href="<?= base_url(); ?>permissoes/redireciona?id=0">Incluir Permissão</a></li>
        </div>        
        <div class="row">
            <table id="dt_permissoes" name="dt_permissoes" class="table table-striped table-bordered table-responsive text text-sm text-center">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>acesso Colaborador</th>
                        <th>acesso Endereço Colaborador</th>
                        <th>acesso Fornecedor</th>
                        <th>acesso Produtos</th>
                        <th>acesso Compras</th>                        
                        <th>Ação</th>
                    </tr>                    
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="row">
            <li class="btn btn-dark"><a href="<?= base_url(); ?>minds">Voltar</a></li>
        </div>
    </div>
    <div class="card-footer"></div>
</div>
