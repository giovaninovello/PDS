
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-info">
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
                            <label for="cod" class="col-sm-2 control-label">Nome*</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nome"  name="nome" placeholder="Nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <span for="serie" class="col-sm-2 control-label">Serie</span>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="serie" name="serie" placeholder="Serie">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="turma" class="col-sm-2 control-label">Turma*</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="turma" name="turma" placeholder="Turma ">
                            </div>
                        </div>
                        <div class="form-group">
                            <span for="inputEmail3" class="col-sm-2 control-label">Foto</span>

                            <div class="col-sm-3">
                                <input type="file" id="nome_arquivo" name="nome_arquivo">
                            </div>
                        </div>
                        <?php if($_SESSION['tipo']==2){?>
                            <div class="form-group">
                                <span for="aquisicao" class="col-sm-2 control-label">Escola*</span>

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
                                <label for="aquisicao" class="col-sm-2 control-label">Escola*</label>

                                <!-- select -->
                                <div class="col-sm-6">
                                    <select class="form-control" name="escola" id="escola">
                                        <option value="" selected="">Selecione</option>
                                        <?php foreach ($esc as $escola) {
                                            if ($escola['idescola'] == $tbo->escola_idescola) {
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
                        <button type="submit" name="cadastrar"  value="cadastrar" class="btn btn-success  btn-sm btn-flat">Cadastar</button>
                        <label for=""><i> * Todos os campos em negrito sao obrigatórios</i></label>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">



                    <!-- /.box-footer -->
            </form>
        </div>
