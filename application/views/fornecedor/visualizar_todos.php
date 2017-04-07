<div class="ui one column doubling  container  ">
    <h3 class="ui blue dividing header">Visualizar Todos </h3>
    <table  align='center' class="datatable_main ui very small blue  compact table">
        <thead>
        <tr class=" header" align="center">
            <th>Nome</th>
            <th>Endereço</th>
            <th>Cidade</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($fornecedor) {

            foreach ($fornecedor as $item) { ?>
                <tr >
                    <td><?php echo $item['nome_f']; ?></td>
                    <td><?php echo $item['endereco_f']; ?></td>
                    <td><?php echo $item['cidade_f']; ?></td>
                </tr>
                <?php
            }
        }else {

        }
        ?>
        </tbody>
    </table>
    
</div>

</div>


