
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastros de Fornecedores</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <!-- Horizontal Form -->

            <form class="form-horizontal" action="<?php echo base_url('fornecedor/cadastrar'); ?>" method="post">
                <div class="col-md-6">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nome"  name="nome" placeholder="Nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cuter" class="col-sm-2 control-label">Endereço</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputEmail3" class="col-sm-2 control-label">Cidade</label>

                            <!-- select -->
                            <div class="col-sm-5">
                                <select class="form-control" name="cid" id="cid">
                                    <option value="" selected="">Selecione</option>
                                    <?php foreach ($cid as $cidade){?>
                                        <option value="<?=$cidade['idcidade']?>"> <?=$cidade['nome'];?> </option>
                                    <?php } ?>
                                </select>
                                <span class="help-block">Campo Obrigatório</span>
                            </div>
                        </div>
                            <button type="reset" class="btn btn-danger  btn-flat">Cancelar</button>
                            <button type="submit" name="cadastrar"value="cadastrar" class="btn btn-success  btn-flat">Cadastar</button>

                    </div>
                </div>
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer -->
    </form>
    </div>