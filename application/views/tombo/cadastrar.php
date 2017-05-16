
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastros de Tombos</h3>
                <input type="hidden" name="captcha">
            </div>
                <?php if ($cat ) { ?>
                <form class="form-horizontal" <?php echo form_open_multipart('tombo/cadastrar/' .$cat); ?>
                <div class="col-md-8">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Id Exemplar</label>

                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="id"  name="id" placeholder="" value='<?php echo $cat; ?>' disabled="">
                            </div>

                        </div>
                        <div class="form-group has-error">
                            <label for="cod" class="col-sm-2 control-label">Tombo</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="tbo"  name="tbo" placeholder="Numero do Tombo" required="required">
                                <span class="help-block">Campo Obrigatório</span>
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="cod" class="col-sm-2 control-label">Data</label>

                            <div class="col-sm-7">
                                <input type="date" class="form-control" id="data"  name="data" placeholder="Data" value='<?php echo $data; ?>'>
                                <span class="help-block">Campo Obrigatório</span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Exemplar</label>

                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="exemplar"  name="exemplar" value='<?php echo $exemplar['exemplar']+1; ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fornecedor" class="col-sm-2 control-label">Fornecedor</label>

                            <!-- select -->
                            <div class="col-sm-6">
                                <select class="form-control" name="fornecedor" id="fornecedor">
                                    <option value="" selected="">Selecione</option>
                                    <?php foreach ($forn as $fornecedor){?>
                                        <option value="<?=$fornecedor['idfornecedor']?>"> <?=$fornecedor['nome_f'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="aquisicao" class="col-sm-2 control-label">Tipo da Aquisição</label>

                            <!-- select -->
                            <div class="col-sm-6">
                                <select class="form-control" name="classificacao" id="classificacao">
                                    <option value="" selected="">Selecione</option>
                                    <?php foreach ($aqui as $aquisicao){?>
                                        <option value="<?=$aquisicao['idaquisicao']?>"> <?=$aquisicao['descricao_aqui'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aquisicao" class="col-sm-2 control-label">Escola</label>

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

                        <button type="reset" class="btn btn-danger  btn-flat">Cancelar</button>
                        <button type="submit"  name="cadastrar" value="cadastrar" class="btn btn-success  btn-flat">Cadastar</button>

                    </div>
                    <?php } ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">


                </div>
            </form>
        </div>