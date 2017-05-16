<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-body">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tombos do Exemplares</h3>

                </div>
                <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr align="center">
            <th>Catalago</th>
            <th>Numero do Tombo</th>
            <th>Data</th>
            <th>Exemplar</th>
            <th>Fornecedor</th>
            <th>Aquisicao</th>
            <th>Locado</th>
            <th>Visualizar  /  Excluir</th>

        </tr>
        </thead>

        <tbody>
        <!--lopop do tombo !-->
        <?php
        if($catalogo) {

        foreach ($catalogo as $item) { ?>
        <tr align="center">
            <td><?php echo $item['titulo']; ?></td>
            <td><?php echo $item['idtombo']; ?></td>
            <td><?php echo $item['data_tombo']; ?></td>
            <td><?php echo $item['exemplar']; ?></td>
            <td><?php echo $item['endereco_f']; ?></td>
            <td><?php echo $item['descricao_aqui']; ?></td>
            <?php if( $item['locado']=="S"){
                ?><td><span class="btn-sm btn-flat label-danger">Emprestado</span></td><?php
                }else{ ?>
                <td><span class="btn-sm btn-flat label-success">Liberado</span></td><?php
                 } ?></td>
            <td>
                <a href="<?php echo base_url('catalogo/visualizar_item/' . $item['idcatalago']); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                <a href="<?php echo base_url('tombo/deletar/' . $item['idtombo']); ?>" onclick="return confirm('Deseja deletar este tombo?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>

            </td>
            <td></td>

        </tr>




            <?php
        }
        }else {
            ?>
            <br>
            <tr>
                <td  colspan="3" class="text-center">Nao há Itens tombados</td>
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








