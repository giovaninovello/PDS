<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listagem de Usuarios</h3>
            </div>
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
        <thead>

        <tr class="header">
            <th>ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>DATA</th>
            <th>TIPO DE USUARIO</th>
            <th>AÇÕES</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if($usuarios) {
            foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario['idusuarios']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['senha']; ?></td>
                    <td><?= $usuario['tipo_usu'] == 1 ? 'Administrador' : 'Usuário'; ?></td>
                    <td>
                        <a href="<?php echo base_url('usuario/editar/' . $usuario['idusuarios']); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                        <a href="<?php echo base_url('usuario/deletar/' . $usuario['idusuarios']); ?>"onclick="return confirm('Deseja deletar este usuario?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                    </td>

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
    </table>

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

   

 

