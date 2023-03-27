<div class="jumbotron">
    <h2><strong>Editar Pedido</strong></h2>                
    <div class="modal-body">        
        <form class="form-group" id="pedido_compra_edit" name="pedido_compra_edit" method="POST">
            <div class='row'>
                <div class="form-group">
                    <label for="label_nome">Pedido:</label>
                    <input type="text" value="<?= $id_pedido ?>" class="form-control" id="id_pedido" name="id_pedido" readonly="readonly">
                    <input type="hidden" value="<?= $id ?>" class="form-control" id="id" name="id">
                </div>            
                <div class="form-group">
                    <label for="agencia_label">Fornecedor:</label>
                    <select class="form-control" id="id_fornecedor" name="id_fornecedor" autofocus="autofocus">
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
                    <textarea id="obs" name="obs" cols="20" rows="5" class="form-control"><?= $obs ?></textarea>
                </div>  
            </div>             
            <div class="row">
                <table id="dt_fechamento" name="dt_fechamento" class="table table-striped table-bordered table-responsive text text-sm text-center">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>                        
                            <th>Valor Unitário</th>                        
                            <th>Valor Total</th>                        
                            <th>Editar</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($itens as $value) {
                        echo '<tr>';    
                        echo '<td>';    
                        echo $value->nome;    
                        echo '</td>';    
                        echo '<td>';    
                        echo $value->quantidade;    
                        echo '</td>';    
                        echo '<td>';    
                        echo $value->valor_unitario;    
                        echo '</td>';    
                        echo '<td>';    
                        echo 'R$' . ' ' . number_format(($value->valor_unitario*$value->quantidade), 2, ",", ".");    
                        echo '</td>';    
                        echo '<td>';    
                        echo '<a class="btn btn-primary" href="' . base_url() . 'compras/redireciona_item?id=' . $value->id . '">Editar</a>';
                        echo '</td>';    
                        echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary btn-dropbox pull-right" type="submit">Salvar <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
        </form>                
    </div>
    <div class="modal-footer" id="conteudo"></div>
</div>          
