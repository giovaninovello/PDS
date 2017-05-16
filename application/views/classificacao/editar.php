
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edicao de Tipo de Classificacao</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <!-- Horizontal Form -->
            <?php if ($cla ) { ?>
            <form class="form-horizontal" <?php echo form_open_multipart('classificacao/editar/' . $cla['idclassificacao']); ?>
            <input type="hidden" name="id_cla" value="<?php echo $cla['idclassificacao']; ?>">
            <div class="col-md-6">

                    <div class="box-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="cod" class="col-sm-2 control-label">Descricao</label>

                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="descricao"  name="descricao" value='<?php echo $cla['descricao_cla']; ?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cuter" class="col-sm-2 control-label">Numero</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="numero" name="numero" value='<?php echo $cla['numero_cla']; ?>'>
                                </div>
                            </div>
                        </div>
                        <button type="reset" class="btn btn-danger  btn-flat">Cancelar</button>
                        <button type="submit" name="editar"  value="editar" class="btn btn-success  btn-flat">Salvar Alterações</button>

                    </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                                <!-- /.box-footer -->
                </form>
                <?php } ?>
            </div>
