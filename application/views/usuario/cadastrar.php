
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastros de Usuarios</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>
            <!-- Horizontal Form -->

            <form class="form-horizontal" action="<?php echo base_url('usuario/cadastrar'); ?>" method="post">
                <div class="col-md-6">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Nome*</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nome"  name="nome" placeholder="Nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email*</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="senha" class="col-sm-2 control-label">Senha*</label>

                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="senha" class="col-sm-2 control-label">Confirmar senha*</label>

                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" placeholder="Digite a senha  novamente">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo_usuario" class="col-sm-2 control-label">Tipo de Usuario*</label>

                            <div class="col-sm-5">
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="0" >Selecione o tipo de Usuario</option>
                                    <option value="1"> Administrador </option>
                                    <option value="2"> Usuário </option>?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aquisicao" class="col-sm-2 control-label">Escola*</label>

                            <!-- select -->
                            <div class="col-sm-6">
                                <select class="form-control" name="escola" id="escola">
                                    <option value="" selected="">Selecione</option>
                                    <?php foreach ($esc as $escola){?>
                                        <option value="<?=$escola['idescola']?>"> <?=$escola['nome_escola'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <button type="reset" class="btn bg-black  btn-sm btn-flat">Cancelar</button>
                        <button type="submit"  name="cadastrar" value="cadastrar" class="btn btn-success  btn-sm btn-flat">Cadastar</button>
                        <label for=""><i> * Todos os campos em negrito sao obrigatórios</i></label>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer -->
            </form>
        </div>