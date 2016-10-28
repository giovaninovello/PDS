<div class="ui one column doubling  container  ">
    <h3 class="ui blue dividing header">Visualizar Todos </h3>
    <table  align='center' class="ui very small blue  compact table">
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
        <tfoot>
        <tr><th colspan="15">
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


