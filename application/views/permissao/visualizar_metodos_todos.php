<div class="ui one column doubling   container  ">
    <h3 class="ui blue dividing header">Permissões</h3>


    <br>
    <table  border='0'  width='1200' align='center' class="ui very small blue compact table ">
        <thead>
        <tr class="header">
            <th>ID</th>
            <th>CLASSE</th>
            <th>METODO</th>
            <th>IDENTIFICACAO</th>
            <th>PRIVADO</th>
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
        if($metodos) {
            foreach ($metodos as $met) { ?>
                <tr>
                    <td><?php echo $met['id_metodo']; ?></td>
                    <td><?php echo $met['classe']; ?></td>
                    <td><?php echo $met['metodo']; ?></td>
                    <td><?php echo $met['identificacao']; ?></td>
                    <td><?= $met['privado'] == 1 ? 'SIM' : 'NAO'; ?></td>

                    <td>
                        <div class="mini ui icon buttons">
                            <a href="<?php echo base_url('permissao/editar/' . $met['id_metodo']); ?>"><button class=" mini ui icon green button"><i class="file icon"></i></button></a>
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











     

