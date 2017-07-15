<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-header">
            <div class="box-body">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listagem de Fornecedores</h3>
                    </div>
                <table id="example1" class="table table-responsive table-striped">
        <thead>
        <tr class=" header" align="center">
            <th>Nome</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($fornecedor) {

            foreach ($fornecedor as $item) { ?>
                <tr >
                    <td><?php echo $item['nome_f']; ?></td>
                    <td><?php echo $item['endereco_f']; ?></td>
                    <td><?php echo $item['nome']; ?></td>
                    <td>
                        <a href="<?php echo base_url('fornecedor/editar/' . $item['idfornecedor']); ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></button></a>
                        <a href="<?php echo base_url('fornecedor/deletar/' . $item['idfornecedor']); ?>" onclick="return confirm('Deseja deletar este Item?');"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>

                    </td>
                </tr>

                <?php
            }
        }else {

        }
        ?>
        </tbody>
            </div>
    </table>
            </div>
        </div>
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




        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p><b>Confirmar exclusão do registro?</b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a href="<?php echo base_url('fornecedor/deletar/' . $item['idfornecedor']); ?>"><button class="btn btn-success">Confirmar</button></a>
                    </div>
                </div>

            </div>
        </div>

