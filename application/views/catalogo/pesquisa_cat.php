
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-info">
            <div class="box-header ">
                <h3 class="box-title">Pesquisa de Tombos</h3>
                <input type="hidden" name="captcha">
            </div>
            <?php if ($alerta) { ?>
                <div class=" alert alert-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>
            <div class="box-header ">
            <label for="cod" class="col-sm-2 control-label">Pesquisar por:</label>

            <div class="form">
                <form action="<?= base_url()?>tombo/pesquisar" method="post">
                    <!-- radio -->
                    <div class="form-group">
                        <label>
                            <input type="radio" name="radio" value="2" checked="checked" class="minimal" >
                           Tombo
                        </label>
                        <div class="col-md-2">
                        <label>
                            <input type="radio" name="radio" value="1" class="minimal" >
                            Titulo
                        </label>
                        </div>

                    <div class="col-md-11">
                        <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Digite aqui" required="required">
                        <br>
                        <button type="submit"  class="btn btn-success btn-sm"><i class="fa fa-check"></i>Pesquisar</button>
                    </div>
                </div>
            </div>