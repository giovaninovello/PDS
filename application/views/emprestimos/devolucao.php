
<div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="box-body">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Devolucao</h3>
                            <input type="hidden" name="captcha">
                        </div>

                        <?php if ($alerta) { ?>
                            <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                                <?php echo $alerta['mensagem']; ?>
                            </div>
                        <?php } ?>

            <form class="form-horizontal" <?php echo form_open_multipart('emprestimos/devolucao_recibo'); ?>


                    <label for="dados_livro" class="col-sm-3 control-label">DADOS DO ITEM A SER DEVOLVIDO</label><br><br>
                        <div class="form-group">
                            <label for="abrir_livro" class="col-sm-2 control-label"></label>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-primary  btn-flat"  id="abrir_devolucao" >Pesquisa </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titulo" class="col-sm-2 control-label">Exemplar</label>
                            <div class="col-sm-7">
                                <input type="text"  class="form-control" id="titulo"  name="titulo" value="" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitulo" class="col-sm-2 control-label">Nome do Aluno</label>
                            <div class="col-sm-7">
                                <input type="text"  class="form-control" id="aluno_nome"  name="aluno_nome" value="" disabled="disabled">
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="id_tombo" class="col-sm-2 control-label">Tombo</label>
                                <div class="col-sm-4">
                                    <input type="text"  class="form-control" id="id_tombo"  name="id_tombo"  readonly="true">
                                    <input type="hidden"  class="form-control" id="idaluno"  name="idaluno"  readonly="true">
                                </div>
                            </div>


                        <div class="form-group">
                            <label for="subtitulo" class="col-sm-2 control-label">Data da Retirada</label>
                            <div class="col-sm-2">

                                <input type="text"  class="form-control" id="dataret"  name="dataret"  readonly="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitulo" class="col-sm-2 control-label">Data da Devolução</label>
                            <div class="col-sm-2">
                                <input type="text"  class="form-control" id="datadevolucaoreal"  name="datadevolucaoreal"  readonly="true">
                            </div>
                        </div>
                        

                            <div class="box-footer">
                                <button type="submit" name="devolver" id="devolver"  value="devolver" class="btn btn-success  btn-flat">Devolver</button>
                            </div>

                    </div>
            </form>


        </div>




            <!-- Modal  da pesquiisa de livros-->
            <div class="modal fade" id="minhaModal_livro_devolucao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Pesquisa no Acervo</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">Item do Acervo Numero do tombo</label>

                                <div class="col-sm-4">
                                    <input type="text"  class="form-control"  name="pesquisar_tombo" required="required" value="">

                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary  btn-flat" id="buscar_emprestimo" >Pesquisa</button>
                                </div>
                            </div>


                            <div class="load" style="display: none">
                                <img style="margin-left: 1%" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"  alt="">
                            </div>
                            <br><br>
                            <div class="retorno_dev" >

                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <script  src="<?php echo base_url('assets/js/mascaras.js')?>"></script>
    <script  src="<?php echo base_url('assets/js/livro_devolucao.js')?>"></script>

