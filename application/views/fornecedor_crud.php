<div class="jumbotron">
    <h2><strong><?= $incluir == 1 ? 'Incluir' : 'Editar'?> Fornecedor</strong></h2>                
    <div class="modal-body">
        <form class="form-group" id="fornecedores" name="fornecedores" method="POST">
            <div class="form-group">
                <label for="label_nome">Nome:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $nome ?>" class="form-control" id="nome" name="nome" placeholder="Informe o nome do Usuário(a)..." autofocus>            
                <input type="hidden" value="<?= $id == 0 ? 0 : $id ?>" class="form-control" id="id" name="id">
                <input type="hidden" value="<?= $incluir ?>" class="form-control" id="incluir" name="incluir">
            </div>
            <div class="form-group">
                <label for="label_nome">Login:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $login ?>" class="form-control" id="login" name="login" placeholder="Informe o login">                            
            </div>
            <div class="form-group">
                <label for="label_nome">CNPJ:</label>
                <input required="required" type="text" maxlength="15" value="<?= $id == 0 ? '' : $CNPJ ?>" class="form-control" id="CNPJ" name="CNPJ" placeholder="Informe a CNPJ">                            
            </div>            
            <div class="form-group">
                <label for="agencia_label">Telefone:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $telefone ?>" class="form-control" id="telefone" name="telefone" placeholder="Informe o telefone">                            
            </div>
            <div class="form-group">
                <label for="agencia_label">Celular:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $celular ?>" class="form-control" id="celular" name="celular" placeholder="Informe o telefone">                            
            </div>
            <div class="form-group">
                <label for="agencia_label">Status:</label>
                <select class="form-control" id="status" name="status">
                    <?php
                    if ($id <> 0) {
                        $seleciona111 = $status == '1' ? "selected" : " ";
                        $seleciona222 = $status == '0' ? "selected" : " ";
                    } else {
                        $seleciona111 = " ";
                        $seleciona222 = " ";
                    }
                    ?>                    
                    <option value="1" <?php echo $seleciona111; ?>>
                        Ativo
                    </option>
                    <option value="0" <?php echo $seleciona222; ?>>
                        Inativo
                    </option>
                </select>                                   
            </div>
            <button class="btn btn-primary btn-dropbox pull-right" type="submit">Salvar <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
        </form>                
    </div>
    <div class="modal-footer" id="conteudo"></div>
</div>          
