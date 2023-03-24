<div class="card">
    <div class="card-header">
        <h3 class="card-title">Produtos!</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <li class="btn btn-default btn-success"><a href="<?= base_url(); ?>produtos/redireciona?id=0">Incluir Produto</a></li>
        </div>        
        <div class="row">
            <table id="dt_produtos" name="dt_produtos" class="table table-striped table-bordered table-responsive text text-sm text-center">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Unidade</th>
                        <th>Valor Unitário</th>
                        <th>Status</th>
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
