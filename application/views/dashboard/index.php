

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
                        <span class="info-box-text">Cadastros</span>
                        <span class="info-box-number"><?php echo $_SESSION['catalago']?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
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
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">41,410</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
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
                        <span class="info-box-text">Events</span>
                        <span class="info-box-number">41,410</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
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
                        <span class="info-box-text">Comments</span>
                        <span class="info-box-number">41,410</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

            <label for="cod" class="col-sm-2 control-label">Pesquisa Rápida</label>

            <div class="form">
                <form action="<?= base_url()?>catalogo/pesquisar" method="post">
                        <div class="col-md-11">
                            <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Digite aqui o Titulo do Item a ser pesquisado" required="required">
                            <br>
                            <button type="submit"  class="btn btn-success"><i class="fa fa-check"></i>Pesquisar</button>
                        </div>



    </section>

    <section class="content">
        <h4>Ultimos Cadastros Realizados no Sistema</h4>

        <?php

        if($catalogo) {

        foreach ($catalogo as $item) { ?>
            <tr align="center">
                <td><img alt="150x100" width="50" height="80" src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>"></td>
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


