<div class="ui one column doubling   container  ">
    <h3 class="ui blue dividing header">Permissões</h3>

    <table  border='0'  width='1200' align='center' class="datatable ui very small blue compact table ">
        <thead>
        <tr class="header">
            <th>NOME</th>
            <th>CLASSE</th>
            <th>METODO</th>
            <th>EXCLUIR</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($permissao) {
            foreach ($permissao as $per) { ?>
                <tr>
                    <td><?php echo $per['nome']; ?></td>
                    <td><?php echo $per['classe']; ?></td>
                    <td><?php echo $per['metodo']; ?></td>
                    <td>
                        <div class="mini ui icon buttons">
                            <a href="<?php echo base_url('permissao/deletar/' . $per['id_permissoes']); ?>" onclick="return confirm('Deseja deletar este usuario?');"><button class="mini ui icon red button"><i class="trash icon"></i></button></a>
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











     

