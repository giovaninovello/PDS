
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-header">
            <div class="box-body">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listagem de Tipo de Documento</h3>
                    </div>

                <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class=" header" align="center">
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($doc) {

            foreach ($doc as $item) { ?>
                <tr >
                    <td><?php echo $item['idtipo_documento']; ?></td>
                    <td><?php echo $item['descricao']; ?></td>
                    <td>
                        <a href="<?php echo base_url('tipo_doc/editar/' . $item['idtipo_documento']); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                        <a href="<?php echo base_url('tipo_doc/deletar/' . $item['idtipo_documento']); ?>" onclick="return confirm('Deseja deletar este Item?');"><button type="button" id="janela1" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                        
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



        <?php if($modal==true){?>
        <!-- Modal  da pesquiisa de livros-->
        <div class="modal fade" id="exemplomodal" tabindex="-1" role="dialog" aria-
             labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="text-align: center">

                    </div>
                    <?php if ($alerta) { ?>
                        <div class=" alert alert-<?php echo $alerta['class']; ?>">
                            <?php echo $alerta['mensagem']; ?>
                        </div>
                    <?php } ?>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>

            <script type="text/javascript">

                $(document).ready(function() {
                    $('#exemplomodal').modal('show');
                })
            </script>
            <?php }?>

            
