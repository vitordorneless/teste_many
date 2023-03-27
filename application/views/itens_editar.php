<div class="jumbotron">
    <h2><strong>Editar Item</strong></h2>                
    <div class="modal-body">        
        <form class="form-group" id="pedido_item_edit" name="pedido_item_edit" method="POST">
            <div class='row'>
                <div class="form-group">
                    <label for="label_nome">Pedido:</label>
                    <input type="text" value="<?= $id_pedido ?>" class="form-control" id="id_pedido" name="id_pedido" readonly="readonly">
                    <input type="hidden" value="<?= $id ?>" class="form-control" id="id" name="id">
                </div>                            
                <div class="form-group">
                    <label for="label_nome">Quantidade:</label>
                    <input type="text" value="<?= $quantidade ?>" class="form-control" id="quantidade" name="quantidade">                    
                </div>                            
                <div class="form-group">
                    <label for="label_nome">Valor Unitário:</label>
                    <input type="text" value="<?= $valor_unitario ?>" class="form-control" id="valor_unitario" name="valor_unitario">                    
                </div>                            
            </div>                         
            <button class="btn btn-primary btn-dropbox pull-right" type="submit">Salvar <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
        </form>                
    </div>
    <div class="modal-footer" id="conteudo"></div>
</div>          
