<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <?php if ($alerta) { ?>
                    <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                        <?php echo $alerta['mensagem']; ?>
                    </div>

                <?php 
                } ?>
                <?php
                if($catalogo) {

                foreach ($catalogo as $item) { ?>
                <tr align="">
                    <td width="10px"><img alt="150x100" width="50" height="80"
                                          src="<?php echo base_url('assets/uploads/' . $item['nome_imagem']); ?>">
                    <td><?php echo $item['titulo']; ?></td>
                    <td><?php echo $item['descricao']; ?></td>
                    <td><?php echo $item['descricao']; ?></td>

                    <td>
                        <a href="<?php echo base_url('catalogo/visualizar_item/' . $item['idcatalago']); ?>">
                            <button type="button" class="btn btn-sm btn-primary">Ver Exemplar<i class=""></i></button>
                        </a>
                        <?php if ($_SESSION['tipo'] == 1) { ?>
                            <a href="<?php echo base_url('catalogo/editar/' . $item['idcatalago']); ?>">
                                <button type="button" class="btn btn-sm btn-primary">Editar<i class=""></i></button>
                            </a>
                        <?php } ?>
                        <a href="<?php echo base_url('catalogo/exemplares/' . $item['idcatalago']); ?>">
                            <button type="button" class="btn  btn-sm btn-primary">Ver tombos do Exemplar<i class=""></i>
                            </button>
                        </a>
                        <a href="<?php echo base_url('tombo/cadastro/' . $item['idcatalago']); ?>">
                            <button type="button" class="btn  btn-sm btn-primary    ">Tombar<i class=""></i></button>
                        </a>
                    </td>


                </tr>
<?php
}
}





       

