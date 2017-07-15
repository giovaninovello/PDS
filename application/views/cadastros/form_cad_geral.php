<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->

    <div class="box-body">
        <div class="col-md-12">
            <!-- Application buttons -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cadastros</h3>
                </div>
                <div class="box-body">
                    <div class="btn-group">
                        <button type="button" class="btn btn-app btn-info dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-book"></i>Exemplares
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>

                        </button>
                        <ul class="dropdown-menu "  role="menu ">
                            <li><a href="<?php echo base_url('catalogo/cadastro') ?>"><b>Novo</b></a></li>
                            <li><a href="<?php echo base_url('catalogo/visualizar_todos') ?>"><b>Editar</b></a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-app btn-info dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-truck" title="Clique para cadastrar ou editar um Item!"></i>Fornecedor
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>

                        </button>
                        <ul class="dropdown-menu "  role="menu ">
                            <li><a href="<?php echo base_url('fornecedor/cadastro') ?>"><b>Novo</b></a></li>
                            <li><a href="<?php echo base_url('fornecedor/visualizar_todos') ?>"><b>Editar</b></a></li>
                        </ul>
                    </div>
                    <?php if($_SESSION['tipo']==1){ ?>

                    <div class="btn-group">
                        <button type="button" class="btn btn-app btn-info dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-users" title="Clique para cadastrar ou editar um Item!"></i>Usuarios
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>

                        </button>
                        <ul class="dropdown-menu "  role="menu ">
                            <li><a href="<?php echo base_url('usuario/cadastro') ?>"><b>Novo</b></a></li>
                            <li><a href="<?php echo base_url('usuario/visualizar_todos') ?>"><b>Editar</b></a></li>
                        </ul>
                    </div>
                    <?php } ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-app btn-info dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-graduation-cap" title="Clique para cadastrar ou editar um Item!"></i>Alunos
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>

                        </button>
                        <ul class="dropdown-menu "  role="menu ">
                            <li><a href="<?php echo base_url('aluno/cadastrar') ?>"><b>Novo</b></a></li>
                            <li><a href="<?php echo base_url('aluno/visualizar_todos') ?>"><b>Editar</b></a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-app btn-info dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bookmark" title="Clique para cadastrar ou editar um Item!"></i>Autores
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>

                        </button>
                        <ul class="dropdown-menu "  role="menu ">
                            <li><a href="<?php echo base_url('autor/cadastrar') ?>"><b>Novo</b></a></li>
                            <li><a href="<?php echo base_url('autor/visualizar_todos') ?>"><b>Editar</b></a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-app btn-info dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-share-alt" title="Clique para cadastrar ou editar um Item!"></i>Classificacao
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>

                        </button>
                        <ul class="dropdown-menu "  role="menu ">
                            <li><a href="<?php echo base_url('classificacao/cadastrar') ?>"><b>Novo</b></a></li>
                            <li><a href="<?php echo base_url('classificacao/visualizar_todos') ?>"><b>Editar</b></a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-app btn-info dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-industry" title="Clique para cadastrar ou editar um Item!"></i>Cidades
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>

                        </button>
                        <ul class="dropdown-menu "  role="menu ">
                            <li><a href="<?php echo base_url('cidade/cadastrar') ?>"><b>Novo</b></a></li>
                            <li><a href="<?php echo base_url('cidade/visualizar_todos') ?>"><b>Editar</b></a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-app btn-info dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-certificate" title="Clique para cadastrar ou editar um Item!"></i>Tipo Exemplar
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>

                        </button>
                        <ul class="dropdown-menu "  role="menu ">
                            <li><a href="<?php echo base_url('tipo_doc/cadastrar') ?>"><b>Novo</b></a></li>
                            <li><a href="<?php echo base_url('tipo_doc/visualizar_todos') ?>"><b>Editar</b></a></li>
                        </ul>
                    </div>
                    <?php if($_SESSION['tipo']==1){ ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-app btn-info dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-institution" title="Clique para cadastrar ou editar um Item!"></i>Escolas
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>

                        </button>
                        <ul class="dropdown-menu "  role="menu ">
                            <li><a href="<?php echo base_url('escola/cadastrar') ?>"><b>Novo</b></a></li>
                            <li><a href="<?php echo base_url('escola/visualizar_todos') ?>"><b>Editar</b></a></li>
                        </ul>
                    </div>
                    <?php } ?>
                    

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>


