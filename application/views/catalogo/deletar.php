<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <?php if ($alerta) { ?>
                    <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                        <?php echo $alerta['mensagem']; ?>
                    </div>
                <?php } ?>
                <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="btn bg-black btn-sm">voltar</a>

        
        
       

