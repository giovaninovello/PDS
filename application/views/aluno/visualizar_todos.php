<div class="ui one column doubling  container  ">
    <h3 class="ui blue dividing header">Visualizar Todos </h3>
    <table  align='center' class="ui very small blue  compact table">
        <thead>
        <tr class=" header" align="center">
            <th>Nome</th>
            <th>Turma</th>
            <th>Serie</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <tr><th colspan="4">
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

        if($aluno) {

            foreach ($aluno as $item) { ?>
                <tr align="center">
                    <td><?php echo $item['nome_aluno']; ?></td>
                    <td><?php echo $item['turma_aluno']; ?></td>
                    <td><?php echo $item['serie_aluno']; ?></td>
                    <td>
                        <div class="mini ui icon buttons">
                            <a href="<?php echo base_url('aluno/editar/' . $item['idaluno']); ?>"><button class=" mini ui icon green button"><i class="file icon"></i></button></a>
                            <a href="<?php echo base_url('aluno/deletar/' . $item['idaluno']); ?>" onclick="return confirm('Deseja deletar este usuario?');"><button class="mini ui icon red button"><i class="trash icon"></i></button></a>
                        </div>
                    </td>
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
    
</div>

</div>


