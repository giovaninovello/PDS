
<div class="ui blue inverted fluid  menu fixed  ">
    <div class="right ui secondary menu ">
        <a href="" class="right item ">Sistema de Biblioteca V 1.0</a>
    </div>
</div>


<br><br><br><br>
<?php
if(!@$hidemenu)
{ ?>
<div class="ui two column  wide    ">
    <div class="ui inverted fixed vertical  menu  " id="fixado">
        <div class="item">
            <div class="header ">Usuarios</div>
            <div class=" menu ">
                <a  href="<?php echo base_url('usuario/cadastrar') ?>" class="   item "><i class="add  user large  icon "></i>Cadastrar</a>
                <a  href="<?php echo base_url('usuario/visualizar_todos') ?>" class="item"><i class=" list   layout large icon"></i> Visualizar</a>
            </div>
        </div>
        <div class="item">
            <div class=" header">Acervo</div>
            <div class="menu">
                <a href="<?php echo base_url('catalogo/cadastro')?>"class=" item"><i class="add  user large  icon"></i>Cadastros</a>
                <a href="<?php echo  base_url('catalogo/visualizar_todos')?>" class="item"><i class=" tasks  large icon"></i>Listade Livros</a>
                <a href="<?php echo  base_url('catalogo/pesquisa_cat')?>" class="item"><i class=" search  large icon"></i>Pesquisar</a>
            </div>
        </div>
        <div class="item">
            <div class="  header">Circulacao</div>
            <div class="menu">
                <a class="item">Emprestimos</a>
                <a class="item">Devoluções</a>
            </div>
        </div>
        <div class="item">
            <div class=" header">Relatorios</div>
            <div class="menu">
                <a  href="<?php echo base_url('catalogo/menuteste')?>" class="item"><i class="  pdf  large icon"></i>teste de menu</a>
                <a class="item">Itens do Acervo</a>
                <a class="item">Clientes em Atraso</a>
                <a class="item">Emprestimos</a>
            </div>
        </div>
        <div class="item">
            <div class="header">Impressão</div>
            <div class="menu">
                <a class="item">Lombadas</a>
                <a class="item">Etiquetas</a>
                <a class="item">Lombadas com Etiquetas</a>
            </div>
        </div>
        <div class="item">
            <div class=" header">Sistema</div>
            <div class="menu">
                <a  href="<?php echo base_url('conta/sair') ?>" class="item"><i class=" close  large icon"></i>Sair</a>
            </div>
        </div>

    </div>
    <div class="head">
        <?php }?>










