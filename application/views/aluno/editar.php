
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edicao de Alunos</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <!-- Horizontal Form -->
            <?php if ($usuario ) { ?>
            <form class="form-horizontal" <?php echo form_open_multipart('aluno/editar/' . $usuario['idaluno']); ?>
            <input type="hidden" name="id_aluno" value="<?php echo $usuario['idaluno']; ?>">
            <div class="col-md-6">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nome"  name="nome" value='<?php echo $usuario['nome_aluno']; ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="serie" class="col-sm-2 control-label">Serie</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="serie" name="serie" value='<?php echo $usuario['serie_aluno']; ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="turma" class="col-sm-2 control-label">Turma</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="turma" name="turma" value='<?php echo $usuario['turma_aluno']; ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Imagem</label>

                            <div class="col-sm-9">
                                <input type="file" class="small"  id="nome_arquivo" name="nome_arquivo" ><br>
                                <td width="10px"><img alt="150x100" width="50" height="80" src="<?php echo base_url('assets/uploads/'. $usuario['nome_imagem']); ?>">
                            </div>
                        </div>
                        <?php if($_SESSION['tipo']==2){?>
                            <div class="form-group">
                                <label for="aquisicao" class="col-sm-2 control-label">Escola</label>

                                <!-- select -->
                                <div class="col-sm-6">
                                    <select class="form-control" name="escola" id="escola">
                                        <option value="" selected="" disabled="disabled">Selecione</option>
                                        <?php foreach ($esc as $escola) {
                                            if ($escola['idescola'] == $_SESSION['idsession']) {
                                                ?>
                                                <option readonly="false"
                                                        value="<?= $escola['idescola'] ?>" selected=""> <?= $escola['nome_escola']; ?> </option>
                                            <?php } else { ?>

                                            <?php }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <?php }  else{ ?>
                            <div class="form-group">
                                <label for="aquisicao" class="col-sm-2 control-label">Escola</label>

                                <!-- select -->
                                <div class="col-sm-6">
                                    <select class="form-control" name="escola" id="escola">
                                        <option value="" selected="">Selecione</option>
                                        <?php foreach ($esc as $escola) {
                                            if ($escola['idescola'] == $usuario['escola_idescola']) {
                                                ?>
                                                <option
                                                    value="<?= $escola['idescola'] ?>" selected=""> <?= $escola['nome_escola']; ?> </option>
                                            <?php } else { ?>
                                                <option
                                                    value="<?= $escola['idescola'] ?>"> <?= $escola['nome_escola']; ?> </option>
                                            <?php }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <?php }?>
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
