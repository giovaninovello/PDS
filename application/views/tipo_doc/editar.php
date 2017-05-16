
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edicao de Tipo de Documento</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <!-- Horizontal Form -->
            <?php if ($doc ) { ?>
            <form class="form-horizontal" <?php echo form_open_multipart('tipo_doc/editar/' . $doc['idtipo_documento']); ?>
                <input type="hidden" name="id_tipo_doc" value="<?php echo $doc['idtipo_documento']; ?>">
            <div class="col-md-6">

                <div class="box-body">
                    <div class="form-group">
                        <label for="cod" class="col-sm-2 control-label">Descricao</label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="descricao"  name="descricao" value="<?php echo $doc['descricao']; ?>">
                        </div>
                    </div>

                </div>
            </div>
                <!-- /.box-body -->
                <div class="box-footer">


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="btn bg-black">voltar</a>
                    <button type="submit"  name="editar" value="editar" class="btn btn-success  btn-flat">Salvar Alterações</button>

                    <!-- /.box-footer -->
            </form>
            <?php } ?>
        </div>
