
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-info">
            <div class="box-header ">
                <h3 class="box-title">Pesquisa de Emprestimos por Aluno</h3>
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
                    <form action="<?= base_url()?>emprestimos/v_emprestado_aluno" method="post">
                        <!-- radio -->
                        <div class="form-group">
                            <label>
                                <input type="radio" name="radio" value="1" checked="checked" class="minimal" >
                                Nome do aluno
                            </label>
                            <div class="col-md-2">
                                <label>
                                    <input type="radio" name="radio" value="2" class="minimal" >
                                    Código do Aluno
                                </label>
                            </div>

                            <div class="col-md-9">
                                <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Digite aqui" required="required">


                            </div>
                            <div class="col-md-3">
                                <button type="submit"  class="btn btn-success btn-sm"><i class=""></i>Pesquisar</button>
                            </div>
                            <div class="row"></div>
                        </div></div>