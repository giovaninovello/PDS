
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Emprestimos</h3>
                <input type="hidden" name="captcha">
            </div>
            
            <div class="box-body col-lg-offset-1">
            <form class="form-horizontal" <?php echo form_open_multipart('emprestimos/emprestar_recibo'); ?>

            <div class="form-group">
                <label for="cod" class="col-sm-2 control-label">Aluno</label>

                <div class="input-group margin col-md-5">
                    <input type="hidden" class="form-control" id="nome_aluno"  required="required"  name="nome_aluno">
                    <input type="text" class="form-control"  placeholder="Digite o numero do Aluno ou pesquise" id="id_aluno" name="id_aluno">
                    <span class="input-group-btn">
                      <button type="button" id="abrir" class="btn btn-info btn-flat"><i class=" glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </div>
                <div class="form-group ">
                    <label for="cod" class="col-sm-2 control-label">Acervo</label>

                    <div class="input-group margin col-md-5">
                        <input type="hidden" class="form-control" id="titulo" required="required" name="titulo">
                        <input type="text" class="form-control"  placeholder="Digite o numero ou pesquise" id="id_tombo" name="id_tombo">
                    <span class="input-group-btn">
                      <button type="button" id="abrir_livro"  class="btn btn-info btn-flat"><i class=" glyphicon glyphicon-search"></i></button>
                    </span>
                    </div>

                </div>


            <div class="col-sm-3 col-lg-offset-3">
                <button type="submit" class="btn bg-green  btn-lg btn-flat btn-block" id="cadastrar" name="cadastrar" value="cadastrar"  ><i class="glyphicon"></i>CONFIRMAR</button>
            </div>

            </form>
            </div>

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
                        <h4 class="modal-title" id="myModalLabel">Informe aqui o numero do tombo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label JustifyCenter">Tombo</label>

                            <div class="col-sm-7">
                                <input type="text"  class="form-control" placeholder="Informe o Titulo do Item a ser Consultado" name="pesquisar_livro" required="required" value="">

                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-primary  btn-flat" id="buscar_livro" >Pesquisa</button>
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
        <script  src="<?php echo base_url('assets/js/pesquisa.js')?>"></script>
        <script  src="<?php echo base_url('assets/js/pesquisa_livro.js')?>"></script>
        <script  src="<?php echo base_url('assets/js/mascaras.js')?>"></script>

        <script>
            $(document).ready(function () {
                $('input').keypress(function (e) {
                    var code = null;
                    code = (e.keyCode ? e.keyCode : e.which);
                    return (code == 13) ? false : true;
                });
            });
        </script>








