<div class="jumbotron">
    <h2><strong>Incluir Pedido</strong></h2>                
    <div class="modal-body">        
        <form class="form-group" id="pedido_compra" name="pedido_compra" method="POST">
            <div class='row'>
                <div class="form-group">
                    <label for="label_nome">Pedido:</label>
                    <input required="required" type="text" value="<?= $id_pedido == 0 ? '' : $id_pedido ?>" class="form-control" id="id_pedido" name="id_pedido">                            
                </div>            
                <div class="form-group">
                    <label for="agencia_label">Fornecedor:</label>
                    <select class="form-control" id="id_fornecedor" name="id_fornecedor">
                        <?php
                        foreach ($fornecedor as $value) {
                            echo '<option value="' . $value->id . '">' . $value->nome . '</option>';
                        }
                        ?>                                        
                    </select>                                   
                </div>
                <div class="form-group">
                    <label for="agencia_label">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <?php
                        if ($id_pedido <> 0) {
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
                <div class="form-group">
                    <label for="label_nome">Obs:</label>
                    <textarea cols="20" rows="5" class="form-control"></textarea>
                </div>  
            </div> 
            <div class="row">
                <div class="form-group">
                    <label>Adicionar Linha ao pedido</label>
                    <a href="#" class="btn btn-info addline">
                        <i class="fa-adjust"></i>Inserir!!
                    </a>
                </div>
            </div>
            <div class="row">
                <table id="dt_fechamento" name="dt_fechamento" class="table table-striped table-bordered table-responsive text text-sm text-center">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>                        
                            <th>Valor Unitário</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="theline">
                            <td>
                                <select id="id_produto" name="id_produto[]" class="form-control">
                                    <?php
                                    foreach ($produtos as $value) {
                                        echo '<option value="' . $value['id'] . '">' . $value['nome'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>                        
                            <td><input type="text" id="quantidade" name="quantidade[]" class="form-control"></td>
                            <td><input type="text" id="valor" name="valor[]" class="form-control"></td>                        
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary btn-dropbox pull-right" type="submit">Salvar <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
        </form>                
    </div>
    <div class="modal-footer" id="conteudo"></div>
</div>          
