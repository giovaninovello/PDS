<div class="ui one column doubling  container  ">
    <h3 class="ui blue dividing header">Visualizar Todos </h3>
    <table  align='center' class="datatable_main ui very small blue  compact table">
        <thead>
        <tr class=" header" align="center">
            <th>Nome</th>
            <th>Turma</th>
            <th>Serie</th>
            <th>Ações</th>

        </tr>
        </thead>
        
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
                        </div>
                        <div class="mini ui icon buttons">
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


