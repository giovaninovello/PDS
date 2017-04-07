<div class="ui one column doubling  container  " style="padding-left: 10px">
    <h3 class="ui blue dividing header">Visualizar Todos </h3>
    <table  align='center' class="datatable_main ui very small blue  compact table">
        <thead>
        <tr class=" header" align="center">
            <th>Imagem</th>
            <th>Classificacao</th>
            <th>Cutter</th>
            <th>Titulo</th>
            <th>Isnb</th>
            <th>Editora</th>
            <th>Fasciculo</th>
            <th>Issn</th>
            <th>Tipo_Documento</th>
            <th>Visualizar</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if($catalogo) {

            foreach ($catalogo as $item) { ?>
                <tr align="center">
                    <td><h2 class="ui image center header aligned" ><img src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>"class="ui image "></h2></td>
                    <td><?php echo $item['descricao_cla']; ?></td>
                    <td><?php echo $item['cutter']; ?></td>
                    <td><?php echo $item['titulo']; ?></td>
                    <td><?php echo $item['isbn']; ?></td>
                    <td><?php echo $item['editora']; ?></td>
                    <td><?php echo $item['fasciculo']; ?></td>
                    <td><?php echo $item['issn']; ?></td>
                    <td><?php echo $item['descricao']; ?></td>
                    <td >
                        <div class=" mini ui  icon buttons">
                            <a href="<?php echo base_url('catalogo/visualizar_item/' . $item['idcatalago']); ?>"><button  class="ui icon blue button"><i class="unhide icon"></i></button></a>
                        </div>
                    </td>
                </tr>




                <?php
            }
        }else {
            ?>
            <tr>
                <td  colspan="3" class="text-center">Nao há Itens cadastrados</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    
</div>

</div>


