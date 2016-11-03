<div class="ui one column doubling  container  ">
   

    <h3 class="ui blue dividing header">Tombos</h3>

    <table  align='center' class="ui  small very basic table fluid ">
        <thead>
        <tr align="center" class="ui blue inverted  ">
            <th>Catalago</th>
            <th>Numero do Tombo</th>
            <th>Data</th>
            <th>Exemplar</th>
            <th>Fornecedor</th>
            <th>Aquisicao</th>
            <th>Visualizar</th>

        </tr>
        </thead>

        <tbody>
        <!--lopop do tombo !-->
        <?php
        if($catalogo) {

        foreach ($catalogo as $item) { ?>
        <tr align="center">
            <td><?php echo $item['titulo']; ?></td>
            <td><?php echo $item['idtombo']; ?></td>
            <td><?php echo $item['data_tombo']; ?></td>
            <td><?php echo $item['exemplar']; ?></td>
            <td><?php echo $item['fornecedor']; ?></td>
            <td><?php echo $item['descricao_aqui']; ?></td>
            <td>
                <div class="mini ui icon buttons">
                    <a href="<?php echo base_url('usuario/editar/' . $item['idcatalago']); ?>"><button class=" mini ui icon green button"><i class="unhide icon"></i></button></a>
                </div>
            </td>

        </tr>


        <?php
        }
        ?>

        </tbody>
    </table>
    <h3 class="ui blue dividing header"></h3>

</div>


<?php
}







