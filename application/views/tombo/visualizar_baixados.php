
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-header">
            <div class="box-body">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Itens Baixados do Acervo</h3>
                    </div>

                <table id="example1" class="table table-responsive table-striped">
        <thead>
        <tr class=" header" align="center">
            <th>Tombo</th>
            <th>Nome</th>
            <th>Motivo da Baixa</th>
            <th>Data da baixa</th>
            <th>Escola</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if($baixas) {

            foreach ($baixas as $item) { ?>
                <tr >
                    <td><?php echo $item['tombo_idtombo']; ?></td>
                    <td><?php echo $item['titulo']; ?></td>
                    <td><?php echo $item['motivo_baixa']; ?></td>
                    <td><?php echo date ('d-m-Y',strtotime($item['datab'])); ?></td>
                    <td><?php echo $item['nome_escola']; ?></td>
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
                                }
                            }
                        );
                    });


                </script>





            
