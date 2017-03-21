<div class="ui one column doubling   container  ">
    <h3 class="ui blue dividing header">Permissões</h3>


    <br>
    <table  border='0'  width='1200' align='center' class="ui very small blue compact table ">
        <thead>
        <tr class="header">
            <th>NOME</th>
            <th>CLASSE</th>
            <th>METODO</th>
            <th>EXCLUIR</th>
        </tr>
        </thead>
        <tfoot>
        <tr><th colspan="8">
                <div class="ui right floated pagination menu">
                    <a class="icon item">
                        <i class="left chevron icon"></i>
                    </a>
                    <a class="item">1</a>
                    <a class="item">2</a>
                    <a class="item">3</a>
                    <a class="item">4</a>
                    <a class="icon item">
                        <i class="right chevron icon"></i>
                    </a>
                </div>
            </th>
        </tr></tfoot>
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











     

