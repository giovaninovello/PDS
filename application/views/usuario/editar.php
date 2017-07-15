
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edicao de Usuarios</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <!-- Horizontal Form -->
            <?php if ($usuario ) { ?>
        <form class="form-horizontal" <?php echo form_open_multipart('Usuario/editar/' . $usuario['idusuarios']); ?>
            <input type="hidden" name="id_usuario" value="<?php echo $usuario['idusuarios']; ?>">
            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <label for="cod" class="col-sm-2 control-label">Nome</label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nome"  name="nome" value='<?php echo $usuario['nome']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value='<?php echo $usuario['email']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="col-sm-2 control-label">Senha</label>

                        <div class="col-sm-4">
                            <input type="password" name="senha" class="form-control" id="email" placeholder="senha" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="col-sm-2 control-label">Confirmar senha</label>

                        <div class="col-sm-4">
                            <input type="password" name="confirmar_senha"class="form-control" id="confirmar_senha" placeholder="Confirmar senha" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo_usuario" class="col-sm-2 control-label">Tipo de Usuario</label>

                        <div class="col-sm-5">
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="0" >Selecione o tipo de Usuario</option>
                                <option value="1"> Administrador </option>
                                <option value="2"> Usuário </option>?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="escola" class="col-sm-2 control-label">Escola</label>

                        <!-- select -->
                        <div class="col-sm-4">
                            <select class="form-control" name="escola" id="escola">
                                <?php foreach ($esc as $escola) {
                                    if ($escola['idescola'] == $usuario['escola_idescola']) {
                                        ?>
                                        <option value="<?= $escola['idescola'] ?>" selected=""> <?= $escola['nome_escola']; ?> </option>
                                    <?php } else { ?>
                                        <option
                                            value="<?= $escola['idescola'] ?>"> <?= $escola['nome_escola']; ?> </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="btn bg-black btn-sm btn-flat">Cancelar</a>
                <button type="submit"  name="editar" value="editar" class="btn btn-success  btn-sm btn-flat">Salvar Alterações</button>

                <!-- /.box-footer -->
        </form>
    <?php } ?>
        </div>
