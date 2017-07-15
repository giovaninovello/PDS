

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">



    <!-- Main content -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Cadastrados </span>
                        <span class="info-box-number"><?php echo $_SESSION['catalago']?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">
                    Total de cadastros
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Emprestimos</span>
                        <span class="info-box-number"><?php echo $emprestimo?></span>

                        <div class="progress">
                            <div class="progress-bar" ></div>
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">
                     Emprestimos Ativos
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pendentes</span>
                        <span class="info-box-number"><?php echo $pendente?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">
                    Itens com Atraso
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Baixados</span>
                        <span class="info-box-number"><?php echo $_SESSION['baixa']?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">

                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


            <label for="cod" class="col-sm-2 control-label">Pesquisa Rápida</label>

            <div class="form">
                <form action="<?= base_url()?>catalogo/pesquisar" method="post">
                        <div class="col-md-11">
                            <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Digite aqui o Titulo do Item a ser pesquisado" required="required">
                            <br>
                            <button type="submit"  class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i>Pesquisar</button>
                        </div>

            </div>

    </section>

    <section class="content">
        <h4>Ultimos Cadastros Realizados no Sistema</h4>

        <?php

        if($catalogo) {

        foreach ($catalogo as $item) { ?>
            <tr align="center">
                <a href="<?php echo base_url('catalogo/visualizar_item/'. $item['idcatalago']); ?>"><td><img alt="150x100" width="50" height="80" src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>"></td></a>
            </tr>
            <?php
        }
        }else {
            ?>
            <tr>
                <td  colspan="3" class="text-center">Nao há Itens cadastrados</td>
            </tr>
            <?php
        }
        ?>
    </section>
    <section>
        
    </section>
    
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- =========================================================== -->
    <!-- /.content -->


</div>




<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->

<!-- ./wrapper -->


