<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="Teste Vítor Dorneles">
        <link href="<?= base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />        
    </head>    
    <body>        
        <div class="container">
            <br><br><br><br>
            <p class="text-center">Desafio <strong>Vítor Dorneles</strong></p>
            <p class="text-center"><?= validation_errors(); ?></p>
            <?= form_open('form'); ?>
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group">                
                    <input type="text" class="form-control" name="user" id="user" placeholder="Usuário" autofocus="autofocus" required>
                </div>
                <div class="form-group">                
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="********" required>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success btn-block">LOGIN</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="<?= base_url(); ?>public/js/jquery-1.11.1.min.js"></script>
    <script src="<?= base_url(); ?>public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //alert('oi');
        });
    </script>
</body>
</html>