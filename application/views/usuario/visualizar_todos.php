<div class="ui one column doubling   container  ">
    <h3 class="ui blue dividing header">Visualizar Todos</h3>

    <div class="item right">
        <a href="<?php echo base_url('usuario/cadastrar') ?>"><div class=" mini ui primary button   ">Novo Usuario</div></a>
        <a href="<?php echo base_url('usuario/pdf') ?>"><div class="mini ui orange button  ">Gerar Relatorio</div> </a>
    </div>
    <br>
    <table  border='0'  width='1200' align='center' class="ui very small blue compact table ">
        <thead>
        <tr class="header">
            <th>ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>DATA</th>
            <th>TIPO DE USUARIO</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
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
        if($usuarios) {
            foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario['idusuarios']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['senha']; ?></td>
                    <td><?= $usuario['tipo_usu'] == 1 ? 'Administrador' : 'Usuário'; ?></td>
                    <td>
                        <div class="mini ui icon buttons">
                            <a href="<?php echo base_url('usuario/editar/' . $usuario['idusuarios']); ?>"><button class=" mini ui icon green button"><i class="file icon"></i></button></a>
                        </div>
                    </td>
                    <td>
                        <div class="mini ui icon buttons">
                            <a href="<?php echo base_url('usuario/deletar/' . $usuario['idusuarios']); ?>" onclick="return confirm('Deseja deletar este usuario?');"><button class="mini ui icon red button"><i class="trash icon"></i></button></a>
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

 

