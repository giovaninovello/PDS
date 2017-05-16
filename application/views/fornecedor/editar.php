
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edicao de Fornecedores</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <!-- Horizontal Form -->
            <?php if ($usuario ) { ?>
            <form class="form-horizontal" <?php echo form_open_multipart('fornecedor/editar/' . $usuario['idfornecedor']); ?>
                <input type="hidden" name="id_fornecedor" value="<?php echo $usuario['idfornecedor']; ?>">
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group has-error">
                            <label for="cod" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-7">

                                <input type="text" class="form-control" id="nome"  name="nome" value="<?php echo $usuario['nome_f']; ?>">
                                <span class="help-block">Campo Obrigatório</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cuter" class="col-sm-2 control-label">Endereço</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $usuario['endereco_f']; ?>">

                            </div>

                        </div>
                        <div class="form-group has-error">
                            <label for="cuter" class="col-sm-2 control-label">Cidade</label>

                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $usuario['cidade_f']; ?>">
                                <span class="help-block">Campo Obrigatório</span>
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
