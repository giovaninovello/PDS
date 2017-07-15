<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js">
</script>

<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-header">

                <div class="box box-default"><br>
                    
                    <table id="example" class="table table-responsive" >
                        <thead>

                        <tr class=" " align="center">
                            <th>Titulo</th>
                            <th>Subtitulo</th>
                            <th>Tipo</th>
                            <th>Tombo</th>
                            <th>Escola</th>
                            <th>Locado</th>
                            <th>Baixado</th>
                            <th>Data</th>
                            <th>Motivo da Baixa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($inventario) {

                        foreach ($inventario as $item) { ?>
                        <tr>
                            <td><?php echo $item['titulo']; ?></td>
                            <td><?php echo $item['subtitulo']; ?></td>
                            <td><?php echo $item['descricao']; ?></td>
                            <td><?php echo $item['idtombo']; ?></td>
                            <td><?php echo $item['nome_escola']; ?></td>
                            <td><?php echo $item['locado']=="S"?'Sim':'Não'; ?></td>
                            <td><?php echo $item['baixado']=="S"?'Sim':'Não'; ?></td>
                            <td><?php echo date ('d/m/Y',strtotime($item['datab']));?></td>
                            <td><?php echo $item['motivo_baixa'];?></td>
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
    </div>
</div>
</div>


<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        } );
    } );

</script>




            
