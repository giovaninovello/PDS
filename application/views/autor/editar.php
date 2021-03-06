
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edicao de Autor</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <!-- Horizontal Form -->
            <?php if ($autor ) { ?>
            <form class="form-horizontal" <?php echo form_open_multipart('autor/editar/' . $autor['idautor']); ?>
            <input type="hidden" name="id" value="<?php echo $autor['idautor']; ?>">
            <div class="col-md-6">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nome"  name="nome" value='<?php echo $autor['nome_aut']; ?>'>
                            </div>
                        </div>

                        <button type="reset" class="btn bg-black  btn-sm btn-flat">Cancelar</button>
                        <button type="submit" name="editar"  value="editar" class="btn btn-success  btn-sm btn-flat">Salvar Alterações</button>

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
