<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste Vítor Dorneles</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="Teste Vítor Dorneles">        
        <link href="<?php echo base_url(); ?>/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />        
    </head>    
    <body>        
        <div class="container">
            <header>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">                                                
                        <div class="navbar-header">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo base_url();
echo $this->session->userdata("colaborador") == '1' ? 'colaborador' : 'home'
?>">Colaborador</a></li>
                                <li><a href="<?php echo base_url();
                                       echo $this->session->userdata("endcolaborador") == '1' ? 'enderecoColaborador' : 'home'
?>">Colaborador Endereço</a></li>
                                <li><a href="<?php echo base_url();
                                       echo $this->session->userdata("fornecedor") == '1' ? 'fornecedor' : 'home'
?>">Fornecedor</a></li>
                                <li><a href="<?php echo base_url(); ?>permissoes">Permissões</a></li>
                                <li><a href="<?php echo base_url();
                                       echo $this->session->userdata("produtos") == '1' ? 'produtos' : 'home'
?>">Produtos</a></li>            
                                <li><a href="<?php echo base_url();
                                       echo $this->session->userdata("compras") == '1' ? 'compras' : 'home'
?>">Pedidos de Compras</a></li>            
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>
