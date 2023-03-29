<div class="jumbotron">
    <h2><strong><?= $incluir == 1 ? 'Incluir' : 'Editar' ?> Permissões</strong></h2>                
    <div class="modal-body">
        <form class="form-group" id="end_permissoes_form" name="end_permissoes_form" method="POST">
            <div class="form-group">
                <label for="agencia_label">Colaborador:</label>
                <select class="form-control" id="id_many_colaborador" name="id_many_colaborador">
                    <?php
                    foreach ($colaboradores as $value) {
                        $select = $value->id == $id_many_colaborador ? 'selected' : '';
                        echo '<option value="' . $value->id . '" ' . $select . '>' . $value->nome . '</option>';
                    }
                    ?>                                        
                </select>                                   
            </div>            
            <div class="form-group">
                <label for="agencia_label">Acesso Colaborador:</label>
                <input type="hidden" value="<?= $id == 0 ? 0 : $id ?>" class="form-control" id="id" name="id">
                <input type="hidden" value="<?= $incluir ?>" class="form-control" id="incluir" name="incluir">
                <select class="form-control" id="colaborador" name="colaborador">
                    <?php
                    if ($id <> 0) {
                        $seleciona111 = $colaborador == '1' ? "selected" : " ";
                        $seleciona222 = $colaborador == '0' ? "selected" : " ";
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
            <div class="form-group">
                <label for="agencia_label">Acesso Endereço Colaborador:</label>                
                <select class="form-control" id="endcolaborador" name="endcolaborador">
                    <?php
                    if ($id <> 0) {
                        $seleciona1 = $endcolaborador == '1' ? "selected" : " ";
                        $seleciona2 = $endcolaborador == '0' ? "selected" : " ";
                    } else {
                        $seleciona1 = " ";
                        $seleciona2 = " ";
                    }
                    ?>                    
                    <option value="1" <?php echo $seleciona1; ?>>
                        Ativo
                    </option>
                    <option value="0" <?php echo $seleciona2; ?>>
                        Inativo
                    </option>
                </select>                                   
            </div>
            <div class="form-group">
                <label for="agencia_label">Acesso Fornecedor:</label>                
                <select class="form-control" id="fornecedor" name="fornecedor">
                    <?php
                    if ($id <> 0) {
                        $seleciona1f = $fornecedor == '1' ? "selected" : " ";
                        $seleciona2f = $fornecedor == '0' ? "selected" : " ";
                    } else {
                        $seleciona1f = " ";
                        $seleciona2f = " ";
                    }
                    ?>                    
                    <option value="1" <?php echo $seleciona1f; ?>>
                        Ativo
                    </option>
                    <option value="0" <?php echo $seleciona2f; ?>>
                        Inativo
                    </option>
                </select>                                   
            </div>
            <div class="form-group">
                <label for="agencia_label">Acesso Produtos:</label>                
                <select class="form-control" id="produtos" name="produtos">
                    <?php
                    if ($id <> 0) {
                        $seleciona111p = $produtos == '1' ? "selected" : " ";
                        $seleciona222p = $produtos == '0' ? "selected" : " ";
                    } else {
                        $seleciona111p = " ";
                        $seleciona222p = " ";
                    }
                    ?>                    
                    <option value="1" <?php echo $seleciona111p; ?>>
                        Ativo
                    </option>
                    <option value="0" <?php echo $seleciona222p; ?>>
                        Inativo
                    </option>
                </select>                                   
            </div>
            <div class="form-group">
                <label for="agencia_label">Acesso Compras:</label>                
                <select class="form-control" id="compras" name="compras">
                    <?php
                    if ($id <> 0) {
                        $seleciona111c = $compras == '1' ? "selected" : " ";
                        $seleciona222c = $compras == '0' ? "selected" : " ";
                    } else {
                        $seleciona111c = " ";
                        $seleciona222c = " ";
                    }
                    ?>                    
                    <option value="1" <?php echo $seleciona111c; ?>>
                        Ativo
                    </option>
                    <option value="0" <?php echo $seleciona222c; ?>>
                        Inativo
                    </option>
                </select>                                   
            </div>
            <button class="btn btn-primary btn-dropbox pull-right" type="submit">Salvar <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
        </form>                
    </div>
    <div class="modal-footer" id="conteudo"></div>
</div>          
