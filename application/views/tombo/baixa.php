
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastros de Escolas</h3>
                <input type="hidden" name="captcha">
            </div>
            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>


            <!-- Horizontal Form -->

            <form class="form-horizontal" action="<?php echo base_url('escola/cadastrar'); ?>" method="post">
                <div class="col-md-6">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nome_escola"  name="nome_escola" placeholder="Nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cuter" class="col-sm-2 control-label">Endereço</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_escola" name="endereco_escola" placeholder="Endereço">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cuter" class="col-sm-2 control-label">Telefone</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="telefone" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" />

                            </div>
                        </div>
                        <button type="reset"  class="btn btn-danger  btn-sm">Cancelar</button>
                        <button type="submit" name="cadastrar"  value="cadastrar" class="btn btn-success  btn-sm">Cadastar</button>

                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">



                    <!-- /.box-footer -->
            </form>

        </div>
