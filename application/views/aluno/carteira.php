<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-header">

            <h3 class="box-title">Impressão de Carteirinhas de Indentificação</h3>
        </div>
        <div class="box-body">
            <form action="<?php echo base_url('aluno/gerar')?>" method="post">
            <table id="datatable" class="table table-responsive table-striped">
                <thead>

                <tr class="header">
                    <th>Selecionar</th>
                    <th >Nome</th>
                    <th >Turma</th>
                    <th >Serie</th>

                </tr>
                </thead>
                <tbody>

                <?php
                if($alunos) {
                    foreach ($alunos as $item) { ?>
                        <tr>
                            <td width="50px"><input type="checkbox" name="modulo[]" value="<?php echo $item['idaluno'] ?>"  class="fa-check" style="margin-left: 20px"></td>
                            <td><?php echo $item['nome_aluno']; ?></td>
                            <td><?php echo $item['turma_aluno']; ?></td>
                            <td><?php echo $item['serie_aluno']; ?></td>


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
            <button type="submit" class="btn bg-green btn-flat margin">Gerar Selecionados</button>
        </div>


    </div>
    <script>

        $(document).ready(function ()
        {
            $('#datatable').DataTable(
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

   

 

