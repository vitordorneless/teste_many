<div class="jumbotron">
    <h2><strong><?= $incluir == 1 ? 'Incluir' : 'Editar' ?> Endereço do Colaborador</strong></h2>                
    <div class="modal-body">
        <form class="form-group" id="end_colaborador_form" name="end_colaborador_form" method="POST">
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
                <label for="label_nome">CEP:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $cep ?>" class="form-control" id="cep" maxlength="9" name="cep" placeholder="Informe o CEP..." autofocus>            
                <input type="hidden" value="<?= $id == 0 ? 0 : $id ?>" class="form-control" id="id" name="id">
                <input type="hidden" value="<?= $incluir ?>" class="form-control" id="incluir" name="incluir">
            </div>
            <div class="form-group">
                <label for="label_nome">Rua:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $rua ?>" class="form-control" id="rua" name="rua" placeholder="Informe a Rua">                            
            </div>
            <div class="form-group">
                <label for="label_nome">Número:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $numero ?>" class="form-control" id="numero" name="numero">                            
            </div>                        
            <div class="form-group">
                <label for="label_nome">Cidade:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $cidade ?>" class="form-control" id="cidade" name="cidade">                            
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
