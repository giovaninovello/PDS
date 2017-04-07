
<div class="ui one column doubling   container  " style="padding-left: 10px">
    <h3 class="ui blue dividing header">Visualizar Todos</h3>
    <table  border='0' cellpadding="0"  width='100%' align='center' class="datatable_main ui very small blue compact table ">
        <thead>

        <tr class="header">
            <th>Id</th>
            <th>Nome</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($autor) {
            foreach ($autor as $item) { ?>
                <tr>
                    <td><?php echo $item['idautor']; ?></td>
                    <td><?php echo $item['nome_aut']; ?></td>
                    <td>
                        <div class="mini ui icon buttons">
                            <a href="<?php echo base_url('autor/deletar/' . $item['idautor']); ?>" onclick="return confirm('Deseja deletar este usuario?');"><button class="mini ui icon red button"><i class="trash icon"></i></button></a>
                        </div>
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








