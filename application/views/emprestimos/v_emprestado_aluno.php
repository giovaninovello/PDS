
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-header">
            <div class="box-body">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Emprestimos </h3>
                    </div>
                    <table id="example1" class="table table-responsive table-striped">
        <thead>

        <tr class="header">
            <th>Aluno</th>
            <th>Livro</th>
            <th>Titulo</th>
            <th>Data da Reirada</th>
            <th>Data da Devolução Prevista</th>
            <th>Status do Exemplar</th>


        </tr>
        </thead>
        <tbody>
        <?php
        if($escola) {
            foreach ($escola as $item) { ?>
                <tr>

                <td><?php echo $item['nome_aluno']; ?></td>
                <td><?php echo $item['id_tombo']; ?></td>
                <td><?php echo $item['titulo']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($item['dataret'])); ?></td>
                <td><?php echo date('d-m-Y', strtotime($item['datadev'])); ?></td>
                <?php $stringdedata = "%Y-%m-%d";
                if ($item['datadev'] >= mdate($stringdedata)&&$item['status']=="PE") {
                    ?>
                    <td><span class="label label-info">No prazo</span></td><?php
                }
                if ($item['status'] == "OK") {
                    ?>
                    <td><span class="label label-success">Devolvido</span></td><?php
                }
                if ($item['status'] == "PE" && $item['datadev']<mdate($stringdedata)) {
                    ?>
                    <td><span class="label label-danger">Atrasado</span></td><?php
                } ?></td>

                </tr>
                <?php
            }
        }else {
            ?>
            <tr>
                <td  colspan="3" class="text-center">Nao há usuarios cadastrados</td>
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








