
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Devoluções</h3>
                <input type="hidden" name="captcha">
            </div>
            <div class="box-body col-lg-offset-1">



                <form class="form-horizontal" <?php echo form_open_multipart('emprestimos/devolucao_recibo'); ?>
                <div class="form-group ">
                    <label for="cod" class="col-sm-2 control-label">Acervo</label>
                    <div class="input-group margin col-md-5">
                        <input type="text" class="form-control" placeholder="Informe o numero ou pesquise pelo nome" id="id_tombo" name="id_tombo">
                    <span class="input-group-btn">
                      <button type="button"id="abrir_devolucao" class="btn btn-info btn-flat"><i class=" glyphicon glyphicon-search"></i></button>
                    </span>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-offset-3">
                    <button type="submit" class="btn bg-green  btn-lg btn-flat btn-block" name="devolver" id="devolver"  value="devolver"  ><i class=""></i>DEVOLVER</button>
                </div>
                <div class="col-md-7 col-md-offset-1 hidden">
                    <input type="text"  class="form-control" id="titulo"  name="titulo"  readonly="true">
                    <input type="text"  class="form-control" id="idaluno"  name="idaluno"  readonly="true">
                    <input type="text"  class="form-control" id="datadevolucaoreal"  name="datadevolucaoreal"  readonly="true">
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
                                <label for="" class="col-sm-4 control-label">Pesquisa Nome</label>

                                <div class="col-sm-4">
                                    <input type="text"  class="form-control"  name="pesquisar_tombo" required="required" value="">

                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary  btn-sm" id="buscar_emprestimo" >Pesquisa</button>
                                </div>
                            </div>


                            <div class="load" style="display: none">
                                <img style="margin-left: 33%" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"  alt="">
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

