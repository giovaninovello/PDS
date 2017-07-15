
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Tombo</h3>
                <input type="hidden" name="captcha">
            </div>
            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>
            <?php if ($tbo ) { ?>
            <form class="form-horizontal" <?php echo form_open_multipart('tombo/editar/' .$tbo->idtombo); ?>
            <input type="hidden" name="idtombo" value="<?php echo $tbo->idtombo; ?>">
            <div class="col-md-8">
                <div class="box-body">
                    <div class="form-group">
                        <label for="cod" class="col-sm-2 control-label">Id Exemplar</label>

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="id"  name="id"  value="<?php echo $tbo->catalago_idcatalago?>" disabled="">
                        </div>

                    </div>
                    <div class="form-group ">
                        <label for="cod" class="col-sm-2 control-label">Tombo</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tbo"  name="tbo" value="<?php echo $tbo->idtombo?>">
                        </div>
                    </div>

                    <div class="form-group  ">
                        <label for="cod" class="col-sm-2 control-label">Data</label>

                        <div class="col-sm-2">
                            <input type="date" class="form-control datepicker" id="data"   name="data" placeholder="Data" value='<?php echo date('d/m/Y',strtotime($tbo->data_tombo)); ?>'>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="cod" class="col-sm-2 control-label">Exemplar</label>

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="exemplar"  name="exemplar" value="<?php echo  $tbo->exemplar?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fornecedor</label>

                        <div class="col-sm-5">
                            <select class="form-control" name="fornecedor" id="fornecedor">
                                <?php foreach ($forn as $fornecedor) {
                                    if ($fornecedor['idfornecedor'] == $tbo->fornecedor_idfornecedor) {
                                        ?>
                                        <option
                                            value="<?= $fornecedor['idfornecedor'] ?>" selected=""> <?= $fornecedor['nome_f']; ?> </option>
                                    <?php } else { ?>
                                        <option
                                            value="<?= $fornecedor['idfornecedor'] ?>"> <?= $fornecedor['nome_f']; ?> </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="aquisicao" class="col-sm-2 control-label">Tipo da Aquisição</label>

                        <!-- select -->
                        <div class="col-sm-6">
                            <select class="form-control" name="classificacao" id="classificacao">
                                <option value="" selected="">Selecione</option>
                                <?php foreach ($aqui as $aquisicao) {
                                    if ($aquisicao['idaquisicao'] == $tbo->aquisicao_idaquisicao) {
                                        ?>
                                        <option
                                            value="<?= $aquisicao['idaquisicao'] ?>" selected=""> <?= $aquisicao['descricao_aqui']; ?> </option>
                                    <?php } else { ?>
                                        <option
                                            value="<?= $aquisicao['idaquisicao'] ?>"> <?= $aquisicao['descricao_aqui']; ?> </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <?php if($_SESSION['tipo']==2){?>
                    <div class="form-group">
                        <label for="aquisicao" class="col-sm-2 control-label">Escola</label>

                        <!-- select -->
                        <div class="col-sm-6">
                            <select class="form-control" name="escola" id="escola">
                                <option value="" selected="">Selecione</option>
                                <?php foreach ($esc as $escola) {
                                    if ($escola['idescola'] == $_SESSION['idsession']) {
                                        ?>
                                        <option
                                            value="<?= $escola['idescola'] ?>" selected="" > <?= $escola['nome_escola']; ?> </option>
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


                    <a href="<?php echo base_url('catalogo/pesquisa_cat'); ?>" type="submit" class="btn bg-black btn-sm btn-flat">Cancelar</a>
                    <button type="submit"  name="editar" value="editar" class="btn btn-success  btn-sm btn-flat">Cadastar</button>

                </div>
                <?php } ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
                <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
                <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
                <script>
                    $(function() {

                        $(".datepicker").datepicker({
                           
                            dateFormat: 'dd/mm/yy',
                            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                            nextText: 'Próximo',
                            prevText: 'Anterior'
                        });
                    });
                </script>
            </div>
            </form>
        </div>