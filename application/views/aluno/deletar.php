<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <?php if ($alerta) { ?>
                    <div class=" alert alert-<?php echo $alerta['class']; ?>">
                        <?php echo $alerta['mensagem']; ?>
                    </div>
                <?php } ?>
                <a href="<?php echo base_url('Aluno/visualizar_todos'); ?>" type="submit" class="btn  btn-sm bg-black">voltar</a>


       

