
<div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="box-body">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Emprestimos</h3>
                            <input type="hidden" name="captcha">
                        </div>

                        <?php if ($alerta) { ?>
                            <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                                <?php echo $alerta['mensagem']; ?>
                            </div>
                        <?php } ?>

            <form class="form-horizontal" <?php echo form_open_multipart('emprestimos/emprestar_recibo'); ?>
                <label for="dados" class="col-sm-2 control-label">DADOS DOS ALUNOS</label><br><br>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="abrir" class="col-sm-2 control-label"></label>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-primary  btn-flat"  id="abrir" >Pesquisa </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_aluno" class="col-sm-2 control-label">Código Aluno</label>

                            <div class="col-sm-2">
                                <input type="text"  class="form-control" id="id_aluno"  name="id_aluno"  readonly="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nome" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-7">
                                <input type="text"  class="form-control" id="nome"  name="nome"  disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pendente" class="col-sm-2 control-label">Pendente</label>
                            <div class="col-sm-1">
                                <input type="text"  class="form-control" id="pendente"  name="pendente" value="" disabled="disabled">

                            </div>
                        </div>
                        <div class="box box-comments"></div>


                    <label for="dados_livro" class="col-sm-3 control-label">DADOS DO ITEM A SER EMPRESTADO</label><br><br>
                        <div class="form-group">
                            <label for="abrir_livro" class="col-sm-2 control-label"></label>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-primary  btn-flat"  id="abrir_livro" >Pesquisa </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titulo" class="col-sm-2 control-label">Exemplar</label>
                            <div class="col-sm-7">
                                <input type="text"  class="form-control" id="titulo"  name="titulo" value="" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitulo" class="col-sm-2 control-label">Subtitulo</label>
                            <div class="col-sm-7">
                                <input type="text"  class="form-control" id="subtitulo"  name="subtitulo" value="" disabled="disabled">
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="id_tombo" class="col-sm-2 control-label">Tombo</label>
                                <div class="col-sm-4">
                                    <input type="text"  class="form-control" id="id_tombo"  name="id_tombo"  readonly="true">
                                </div>
                            </div>








                            <div class="box-footer">
                                <button type="reset" class="btn btn-warning  btn-flat">Cancelar</button>
                                <button type="submit" name="cadastrar" id="cadastrar"  value="cadastrar" class="btn btn-success  btn-flat">Realizar Emprestimo</button>

                            <!-- /.box-footer -->
                            </div>

                    </div>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="minhaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Pesquisa de Usuarios</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Aluno</label>

                                <div class="col-sm-7">
                                    <input type="text"  class="form-control"  name="pesquisar" required="required" value="">

                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary  btn-flat" id="buscar" >Pesquisa</button>
                                </div>
                            </div>


                            <div class="load" style="display: none">
                                <img style="margin-left: 30%" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"  alt="">
                            </div>
                            <br><br>
                            <div class="retorno" >

                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




            <!-- Modal  da pesquiisa de livros-->
            <div class="modal fade" id="minhaModal_livro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Pesquisa no Acervo</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Item do Acervo</label>

                                <div class="col-sm-7">
                                    <input type="text"  class="form-control" placeholder="Informe o Titulo do Item a ser Consultado" name="pesquisar_livro" required="required" value="">

                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary  btn-flat" id="buscar_livro" >Pesquisa</button>
                                </div>
                            </div>


                            <div class="load" style="display: none">
                                <img style="margin-left: 15%" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"  alt="">
                            </div>
                            <br><br>
                            <div class="retorno" >

                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <script  src="<?php echo base_url('assets/js/pesquisa.js')?>"></script>
                    <script  src="<?php echo base_url('assets/js/pesquisa_livro.js')?>"></script>
                    <script  src="<?php echo base_url('assets/js/mascaras.js')?>"></script>