
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-header">
            <div class="box-body">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listagem de Cidades</h3>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
        <thead>

        <tr class="header">
            <th>Id</th>
            <th>Nome</th>
            <th>UF</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($cidade) {
            foreach ($cidade as $item) { ?>
                <tr>
                    <td><?php echo $item['idcidade']; ?></td>
                    <td><?php echo $item['nome']; ?></td>
                    <td><?php echo $item['uf']; ?></td>
                    <td>
                        <div class="mini ui icon buttons">
                            <a href="<?php echo base_url('cidade/editar/' . $item['idcidade']); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                            <a href="<?php echo base_url('cidade/deletar/' . $item['idcidade']); ?>" onclick="return confirm('Deseja deletar esta cidade ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                        </div>
                    </td>
                </tr>
                <?php
            }
        }else {
            ?>
            <tr>
                <td  colspan="3" class="text-center">Nao há cidades cadastradas</td>
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








