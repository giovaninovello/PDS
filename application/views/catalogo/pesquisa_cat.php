
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Pesquisa de Exemplares,Itens...</h3>
                <input type="hidden" name="captcha">
            </div>
            <?php if ($alerta) { ?>
                <div class=" alert alert-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>
            <label for="cod" class="col-sm-2 control-label">Pesquisa Rápida</label>

            <div class="form">
                <form action="<?= base_url()?>catalogo/pesquisar" method="post">
                    <div class="col-md-11">
                        <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Digite qualquer elemento para a pesquisa nome,titulo..." required="required">
                        <br>
                        <button type="submit"  class="btn btn-success"><i class="fa fa-check"></i>Pesquisar</button>
                    </div>
