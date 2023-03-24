<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pedidos de Compras!</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <li class="btn btn-default btn-success"><a href="<?= base_url(); ?>compras/redireciona">Incluir Pedido de Compras</a></li>
        </div>        
        <div class="row">
            <table id="dt_compra" name="dt_compra" class="table table-striped table-bordered table-responsive text text-sm text-center">
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Fornecedor</th>                        
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
