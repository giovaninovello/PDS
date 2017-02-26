<div class="ui one column doubling  container  ">
    <h3 class="ui blue dividing header">Visualizar Todos </h3>
    <table  align='center' class="ui very small blue  compact table">
        <thead>
        <tr class=" header" align="center">
            <th>Nome</th>
            <th>Endereço</th>
            <th>Cidade</th>

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

        if($fornecedor) {

            foreach ($fornecedor as $item) { ?>
                <tr align="center">
                    <td><?php echo $item['nome_f']; ?></td>
                    <td><?php echo $item['endereco_f']; ?></td>
                    <td><?php echo $item['cidade_f']; ?></td>

                    <td >

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


