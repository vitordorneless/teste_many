<p class="text-center">Desafio <strong>Vítor Dorneles</strong></p>
</div>
<script src="<?= base_url(); ?>public/js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url(); ?>public/bootstrap/js/bootstrap.min.js"></script>  
<script src="<?= base_url(); ?>public/js/util/dataTables.bootstrap.min.js"></script>  
<script src="<?= base_url(); ?>public/js/util/datatables.min.js"></script>  
<script src="<?= base_url(); ?>public/js/util/util.js"></script>  
<script src="<?= base_url(); ?>public/js/util/sweetalert2.all.min.js"></script>  
<?php
if (isset($scripts)) {
    foreach ($scripts as $value) {
        $src = base_url() . "public/js/" . $value;
        echo '<script src="' . $src . '"></script>';
    }
}
?>
</body>
</html>