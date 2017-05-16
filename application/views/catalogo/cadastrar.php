
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastros de Exemplares</h3>
                <input type="hidden" name="captcha">
            </div>

            <!-- Horizontal Form -->
            <form class="form-horizontal" <?php echo form_open_multipart('catalogo/cadastrar'); ?>
                <div class="col-md-6">

                    <div class="box-body">
                <div class="form-group">
                    <label for="cod" class="col-sm-2 control-label">Código</label>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="cod" placeholder="Código" disabled="disabled">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cuter" class="col-sm-2 control-label">Cutter</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="cuter" id="cuter" placeholder="Cutter">
                    </div>
                </div>
                <div class="form-group has-error">
                    <label for="classificacao" class="col-sm-2 control-label">Classificaçao</label>

                    <!-- select -->
                    <div class="col-sm-6">
                        <select class="form-control" name="classificacao" id="classificacao">
                            <option value="" selected="">Selecione</option>
                            <?php foreach ($cla as $classificacao){?>
                                <option value="<?=$classificacao['idclassificacao']?>"> <?=$classificacao['descricao_cla'];?> </option>
                            <?php } ?>
                        </select>
                        <span class="help-block">Campo Obrigatório</span>
                    </div>
                </div>
                <div class="form-group has-error">
                    <label for="classificacao" class="col-sm-2 control-label">Autores</label>

                    <!-- select -->
                    <div class="col-sm-4">
                        <select class="form-control" name="aut" id="aut">
                            <option value="" selected="">Selecione</option>
                            <?php foreach ($aut as $autor){?>
                                <option value="<?=$autor['idautor']?>"><?=$autor['nome_aut'];?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block">Campo Obrigatório</span>
                    </div>
                </div>
                <div class="form-group has-error">
                    <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo ">
                        <span class="help-block">Campo Obrigatório</span>
                    </div>

                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Subtitulo</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Subtitulo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Edição</label>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="edicao" name="edicao" placeholder="Edição">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Paginas</label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="totalpagina"name="totalpagina" placeholder="Paginas">
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
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Volume</label>

                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="volume" name="volume" placeholder="Volume">
                    </div>
                </div>

            </div>
        </div>
            <div class="col-md-6">
                <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ISSN</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="issn"  name="issn" placeholder="ISSN">
                    </div>
                </div>
                <div class="form-group has-error">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tipo de documento</label>

                    <div class="col-sm-5">
                        <select class="form-control" name="tipo" id="tipo">
                            <option value="" selected="">Selecione</option>
                            <?php foreach ($tipo as $tipo_documento){?>
                                <option value="<?=$tipo_documento['idtipo_documento']?>"> <?=$tipo_documento['descricao'];?> </option>
                            <?php } ?>
                        </select>
                        <span class="help-block">Campo Obrigatório</span>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nota de Serie</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nota_serie"  name="nota_serie" placeholder="Nota de Serie">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">ISBN</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Editora</label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="editora"  name="editora" placeholder="Editora">
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label for="inputEmail3" class="col-sm-2 control-label">Data da publicação</label>

                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="datapub" name="datapub" placeholder="data da publicação">
                            <span class="help-block">Campo Obrigatório</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Imagem</label>

                        <div class="col-sm-3">
                            <input type="file" id="nome_arquivo" name="nome_arquivo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Observações</label>

                        <!-- textarea -->
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Enter ..." id="obs" name="obs"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fasciculo</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="fasciculo" name="fasciculo" placeholder="fasciculo">
                        </div>
                    </div>

            </div>
            </div>
            <div class="box-footer">

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="btn bg-black btn-flat">voltar</a>
                <button type="submit"  name="cadastrar" value="cadastrar"  class="btn btn-success  btn-flat">Cadastar</button>

            <!-- /.box-footer -->
        </form>
    </div>



            <?php if($modal==true){?>
            <!-- Modal  da pesquiisa de livros-->
            <div class="modal fade" id="exemplomodal" tabindex="-1" role="dialog" aria-
                 labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" style="text-align: center">

                        </div>
                        <?php if ($alerta) { ?>
                            <div class=" alert alert-<?php echo $alerta['class']; ?>">
                                <?php echo $alerta['mensagem']; ?>
                            </div>
                        <?php } ?>

                        <div class="modal-footer">
                            <a href="<?php echo base_url('catalogo/cadastro'); ?>" type="submit" class="btn bg-black btn-flat">Ok</a>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">

                    $(document).ready(function() {
                        $('#exemplomodal').modal('show');
                    })
                </script>
                <?php }?>

                <script  src="<?php echo base_url('assets/js/cadastro.js')?>"></script>
