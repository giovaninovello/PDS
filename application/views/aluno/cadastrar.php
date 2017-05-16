
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastros de Alunos</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <form class="form-horizontal" <?php echo form_open_multipart('aluno/cadastrar'); ?>
                <div class="col-md-6">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nome"  name="nome" placeholder="Nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="serie" class="col-sm-2 control-label">Serie</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="serie" name="serie" placeholder="Serie">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="turma" class="col-sm-2 control-label">Turma</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="turma" name="turma" placeholder="Turma ">
                            </div>
                        </div>
                        <button type="reset" class="btn btn-danger  btn-flat">Cancelar</button>
                        <button type="submit" name="cadastrar"  value="cadastrar" class="btn btn-success  btn-flat">Cadastar</button>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">



                    <!-- /.box-footer -->
            </form>
        </div>
