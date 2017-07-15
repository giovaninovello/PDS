<?php
if(!@$hidemenu)
{ ?>

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>WL</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>WI-LIBRARY</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->

            <a href="#" class="sidebar-toggle pull-left" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>



            </a>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- Notifications: style can be found in dropdown.less -->
                    <!-- Tasks: style can be found in dropdown.less -->


                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu pull-left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            
                            <span class="hidden-xs"><?php echo $_SESSION['nome'];?></span>


                        </a>


                    </li>
                    
                    <!-- Control Sidebar Toggle Button -->

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url('Conta/sair') ?>">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url('assets/img/capaologo.jpg')?>" class="img" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $_SESSION['escola'];?></p>

                </div>
            </div>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="<?php echo base_url('dashboard/index')?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                    </a>
                </li>

                <li class="treeview ">
                    <a href="<?php echo base_url('cadastros/form_cad_geral') ?>" >
                        <i class="fa fa-laptop"></i>
                        <span >Cadastros</span>
                    </a>

                </li>

                <li class="treeview">
                    <a href="<?php echo base_url('catalogo/pesquisa_cat') ?>">
                        <i class="fa fa-book"></i>
                        <span>Pesquisa de Tombos</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Circulação</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('emprestimos/emprestar') ?>"><i class="fa fa-institution"></i> <span>Emprestimos</span></a></li>
                        <li><a href="<?php echo base_url('emprestimos/devolucao') ?>"><i class="fa fa-calendar-o"></i> <span>Devoluções</span></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list"></i> <span>Consultas</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('emprestimos/v_emprestado') ?>"><i class="glyphicon glyphicon-check"></i> <span>Emprestados </span></a></li>
                        <li><a href="<?php echo base_url('emprestimos/form_pesquisa_data') ?>"><i class="glyphicon glyphicon-calendar"></i> <span>Emprestimos por Data</span></a></li>
                        <li><a href="<?php echo base_url('emprestimos/form_pesquisa_aluno') ?>"><i class="glyphicon glyphicon-education"></i> <span>Emprestimos por Aluno</span></a></li>
                        <?php if($_SESSION['tipo']==1){ ?>
                        <li><a href="<?php echo base_url('tombo/baixados') ?>"><i class="glyphicon glyphicon-transfer"></i> <span>Baixados</span></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php if($_SESSION['tipo']==1){ ?>
                <li class="treeview">
                    <a href="<?php echo base_url('tombo/inventario')?>">
                        <i class="fa fa-database"></i> <span>Inventario</span>
                        <span class="pull-right-container">
                         </span>
                    </a>
                </li>
                <?php } ?>
                    <li class="treeview">
                        <a href="<?php echo base_url('aluno/gera_car')?>">
                            <i class="glyphicon glyphicon-credit-card"></i> <span>Impressão Carteirinhas</span>
                        <span class="pull-right-container">
                         </span>
                        </a>
                    </li>

                <li class="treeview">
                    <a href="">
                        <i class="fa fa-barcode"></i> <span>Impressão Etiquetas</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('etiquetas/index') ?>"><i class="glyphicon glyphicon-barcode"></i> <span>Etiquetas Código Barras </span></a></li>
                        

                    </ul>
                </li>

                

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


    <!-- =============================================== -->

    <?php }?>

   