<div class="jumbotron">
    <h2><strong><?= $incluir == 1 ? 'Incluir' : 'Editar' ?> Produto</strong></h2>                
    <div class="modal-body">
        <form class="form-group" id="produtos_form" name="produtos_form" method="POST">
            <div class="form-group">
                <label for="label_nome">Nome:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $nome ?>" class="form-control" id="nome" name="nome" placeholder="Informe o nome do Usuário(a)..." autofocus>            
                <input type="hidden" value="<?= $id == 0 ? 0 : $id ?>" class="form-control" id="id" name="id">
                <input type="hidden" value="<?= $incluir ?>" class="form-control" id="incluir" name="incluir">
            </div>
            <div class="form-group">
                <label for="label_nome">Unidade:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $unidade ?>" class="form-control" id="unidade" name="unidade" placeholder="Informe a Unidade">                            
            </div>
            <div class="form-group">
                <label for="label_nome">Valor Unitário R$:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $valor_unitario ?>" class="form-control" id="valor_unitario" name="valor_unitario">                            
            </div>            
            <div class="form-group">
                <label for="agencia_label">Fornecedor:</label>
                <select class="form-control" id="id_fornecedor" name="id_fornecedor">
                    <?php
                    foreach ($fornecedor as $value) {
                        $select = $value->id == $id ? 'selected' : '';
                        echo '<option value="' . $value->id . '" ' . $select . '>' . $value->nome . '</option>';
                    }
                    ?>                                        
                </select>                                   
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
