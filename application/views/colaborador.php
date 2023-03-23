<div class="card">
    <div class="card-header">
        <h3 class="card-title">Colaborador!</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <li class="btn btn-default btn-success"><a href="<?= base_url(); ?>colaborador/resgate?id=0">Incluir Colaborador</a></li>
        </div>        
        <div class="row">
            <table id="dt_colaboradores" name="dt_colaboradores" class="table table-striped table-bordered table-responsive text text-sm text-center">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>CPF</th>
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
