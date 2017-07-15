
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box box-solid box-default">
    <div class="box-body">
        <div class="">
            <div class="box-header with-border">
                <h3 class="box-title " >Listagem de Exemplares</h3>
            </div>

            <table id="example1" class="table table-responsive ">
        <thead >
        <tr align="center">
            <th>Imagem</th>
            <th>Titulo</th>
            <th>Tipo_Documento</th>
            <th>Data</th>
            <th class="text-center">Opcoes</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if($catalogo) {

            foreach ($catalogo as $item) { ?>
                <tr align="">
                    <td width="10px"><img alt="150x100" width="50" height="80" src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>">
                    <td><?php echo $item['titulo']; ?></td>
                    <td><?php echo $item['descricao']; ?></td>
                    <td><?php echo $item['descricao']; ?></td>

                    <td>
                        <a href="<?php echo base_url('catalogo/visualizar_item/' . $item['idcatalago']); ?>"><button type="button" class="btn btn-sm btn-primary">Ver Exemplar<i class=""></i></button></a>
                        <?php if($_SESSION['tipo']==1){?>
                        <a href="<?php echo base_url('catalogo/editar/' . $item['idcatalago']); ?>"><button type="button" class="btn btn-sm btn-primary">Editar<i class=""></i></button></a>
                        <?php }?>
                        <a href="<?php echo base_url('catalogo/exemplares/' . $item['idcatalago']); ?>"><button type="button" class="btn  btn-sm btn-primary">Ver tombos do Exemplar<i class=""></i></button></a>
                        <a href="<?php echo base_url('tombo/cadastro/' . $item['idcatalago']); ?>"><button type="button" class="btn  btn-sm btn-primary    ">Tombar<i class=""></i></button></a>
                    </td>



                </tr>
                <?php
            }
        }else {
            ?>

            <?php
        }
        ?>
        </tbody>

        </div>
        </table>
        <script>



            $(document).ready(function ()
            {
                $('#example1').DataTable(
                    {
                        responsive: true,

                        "oLanguage":{
                            "responsive": "true",
                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sLengthMenu": "_MENU_ resultados por página",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sSearch": "Pesquisar",
                            "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"

                            }

                        }




                    }
                );
            });

        
        </script>


    </div>
</div>






