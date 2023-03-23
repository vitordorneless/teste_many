<div class="jumbotron">
    <h2><strong>Incluir / Editar Usuário</strong></h2>                
    <div class="modal-body">
        <form id="form" method="POST">
            <div class="form-group">
                <label for="label_nome">Nome do Usuário:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $data['nome'] ?>" class="form-control" id="nome" name="nome" placeholder="Informe o nome do Usuário(a)..." autofocus>            
                <input type="hidden" value="<?= $id == 0 ? 0 : $data['id'] ?>" class="form-control" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="label_nome">Login:</label>
                <input required="required" type="text" value="<?= $id == 0 ? '' : $data['login'] ?>" class="form-control" id="login" name="login" placeholder="Informe o login">                            
            </div>
            <div class="form-group">
                <label for="label_nome">CPF:</label>
                <input required="required" type="password" value="<?= $id == 0 ? '' : $data['pass'] ?>" class="form-control" id="pass" name="pass" placeholder="Informe a senha">                            
            </div>            
            <div class="form-group">
                <label for="agencia_label">Estado Civil:</label>
                <select class="form-control" id="estado_civil" name="estado_civil">
                    <?php
                    if ($id <> 0) {
                        $seleciona11 = $data['estado_civil'] == '1' ? "selected" : " ";
                        $seleciona22 = $data['estado_civil'] == '0' ? "selected" : " ";
                    } else {
                        $seleciona11 = " ";
                        $seleciona22 = " ";
                    }
                    ?>
                    <option selected value="0">
                        Aguardando...
                    </option>
                    <option value="1" <?php echo $seleciona11; ?>>
                        Casado
                    </option>
                    <option value="0" <?php echo $seleciona22; ?>>
                        Solteiro
                    </option>
                </select>                                   
            </div>
            <div class="form-group">
                <label for="agencia_label">Sexo:</label>
                <select class="form-control" id="genero" name="genero">
                    <?php
                    if ($id <> 0) {
                        $seleciona11 = $data['genero'] == '1' ? "selected" : " ";
                        $seleciona22 = $data['genero'] == '0' ? "selected" : " ";
                    } else {
                        $seleciona11 = " ";
                        $seleciona22 = " ";
                    }
                    ?>                    
                    <option value="1" <?php echo $seleciona11; ?>>
                        M
                    </option>
                    <option value="0" <?php echo $seleciona22; ?>>
                        F
                    </option>
                </select>                                   
            </div>
            <button class="btn btn-primary btn-dropbox pull-right" id="envia" type="submit">Salvar <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
        </form>                
    </div>
</div>          
