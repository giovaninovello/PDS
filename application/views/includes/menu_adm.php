
<div class="ui  inverted fluid  menu fixed  ">
    <?php
    if(!@$hidemenu)
    { ?>
        <div class="ui secondary menu " style="padding-left: 200px">
            <a href="" class=" view-ui code centered item "><i class="sidebar icon"></i><b>Usuario : <?php echo $_SESSION['nome'];?></b></a>
        </div>
    <?php }?>
    <div class="right ui secondary menu ">
        <a  href="" class="code centered item "></i><b>SISTEMA DE BIBLIOTECA V 1.0</b></a>

    </div>
</div>

<br><br><br><br>
<?php
if(!@$hidemenu)
{ ?>
<div class="ui two column  wide   " style="padding-left: 0px">
    <div class="ui sidebar vertical  inverted blue   menu  visible " >
        <br><br>
        <a  href="<?php echo base_url('dashboard/index') ?>" class="item "><i class="sidebar icon"></i><div class="header" style="color: #0c0c0c">Dashboard </div></a>
        <a  href="<?php echo base_url('cadastros/form_cad_geral') ?>" class="item "><i class="add  user   icon
"></i><div class="header ">Cadastros </div></a>
        <a  href="<?php echo base_url('visualizacoes/form_visualizar_geral') ?>" class="item "><i class="unhide   icon
"></i><div class="header ">Visualizações </div></a>
        <a  href="<?php echo base_url('catalogo/pesquisa_cat') ?>" class="item "><i class="search   icon "></i><div
                class="header ">Circulacao </div></a>
        <a  href="<?php echo base_url('catalogo/pesquisa_cat') ?>" class="item "><i class="search   icon "></i><div
                class="header ">Pesquisa </div></a>
        <a  href="<?php echo base_url('catalogo/pesquisa_cat') ?>" class="item "><i class="line chart   icon "></i><div
                class="header ">Relatórios </div></a>
        <a  href="<?php echo base_url('catalogo/pesquisa_cat') ?>" class="item "><i class="search   icon "></i><div
                class="header ">Impressao </div></a>
        <a  href="<?php echo base_url('usuario/permissao') ?>" class="item "><i class="users   icon "></i><div
                class="header ">Permissões </div></a>
        <a  href="<?php echo base_url('conta/sair') ?>" class="item "><i class="remove   icon "></i><div class="header
">Sair </div></a>


    </div>

</div>
<div class="head">
    <?php }?>












