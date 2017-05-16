
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-header">
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Listagem de Exemplares</h3>
            </div>
            
            <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr align="center">
            <th>Imagem</th>
            <th>Classificacao</th>
            <th>Cutter</th>
            <th>Titulo</th>
            <th>Isnb</th>
            <th>Editora</th>
            <th>Fasciculo</th>
            <th>Issn</th>
            <th>Tipo_Documento</th>
            <th>Visualizar</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if($catalogo) {

            foreach ($catalogo as $item) { ?>
                <tr align="center">
                    <td><img alt="150x100" width="50" height="80" src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>">
                    <td><?php echo $item['descricao_cla']; ?></td>
                    <td><?php echo $item['cutter']; ?></td>
                    <td><?php echo $item['titulo']; ?></td>
                    <td><?php echo $item['isbn']; ?></td>
                    <td><?php echo $item['editora']; ?></td>
                    <td><?php echo $item['fasciculo']; ?></td>
                    <td><?php echo $item['issn']; ?></td>
                    <td><?php echo $item['descricao']; ?></td>

                    <td>
                            <a href="<?php echo base_url('catalogo/visualizar_item/' . $item['idcatalago']); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button></a>

                    </td>
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
        </tbody>

        </div>
        </table>
        <script>



            $(document).ready(function ()
            {
                $('#example1').DataTable(
                    {

                        "oLanguage":{

                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sInfoThousands": ".",
                            "sLengthMenu": "_MENU_ resultados por página",
                            "sLoadingRecords": "Carregando...",
                            "sProcessing": "Processando...",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sSearch": "Pesquisar",
                            "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"
                            }

                        },

                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }

                    }
                );
            });


        </script>


    </div>
</div>





