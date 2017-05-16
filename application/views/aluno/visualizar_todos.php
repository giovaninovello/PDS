<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-body">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Listagem de Alunos Cadastrados</h3>
                </div>
                <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr  align="center">
            <th>Nome</th>
            <th>Turma</th>
            <th>Serie</th>
            <th>Ações</th>

        </tr>
        </thead>
        
        <?php

        if($aluno) {

            foreach ($aluno as $item) { ?>
                <tr align="">
                    <td><?php echo $item['nome_aluno']; ?></td>
                    <td><?php echo $item['turma_aluno']; ?></td>
                    <td><?php echo $item['serie_aluno']; ?></td>
                    <td>
                            <a href="<?php echo base_url('aluno/editar/' . $item['idaluno']); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                            <a href="<?php echo base_url('aluno/deletar/' . $item['idaluno']); ?>"onclick="return confirm('Deseja deletar este aluno?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>

                    </td>
                </tr>

                <?php
            }
        }else {
            ?>
            <tr>
                <td  colspan="3" class="text-center">Nao há alunos cadastrados</td>
            </tr>
            <?php
        }
        ?>
        </tbody>

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
                        <a href="<?php echo base_url('aluno/deletar/' . $item['idaluno']); ?>"><button class="btn btn-success">Confirmar</button></a>
                    </div>
                </div>

            </div>
        </div>
