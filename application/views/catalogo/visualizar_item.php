<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        -
    </div>
    <div class="box-body">
    <?php
    if($catalogo) {
    
    foreach ($catalogo as $item) { ?>
        <div class="col-md-2">
            <img alt="250x200" width="100" height="150"  src="<?php echo base_url('assets/uploads/' . $item['nome_imagem']); ?>">
        </div>
        <div class="col-sm-8">
            <section>
                <div class="alert bg-primary alert-dismissible">
                    <h4>Informações Basicas</h4>
                    <div class="col-sm-3">
                        <b>Titulo</b><br>
                        <b>Edicao</b><br>
                        <b>Paginas</b><br>
                        <b>Colecao</b><br>
                        <b>ISBN</b><br>
                        <b>Editora</b><br>
                        <b>Fasciculo</b><br>
                        <b>Classificação</b><br>
                        <b>Tipo</b><br>
                    </div>
                        <?php echo $item['titulo']; ?><br>
                        <?php echo $item['edicao']; ?><br>
                        <?php echo $item['total_pag']; ?><br>
                        <?php echo $item['nota_serie']; ?><br>
                        <?php echo $item['isbn']; ?><br>
                        <?php echo $item['editora']; ?><br>
                        <?php echo $item['fasciculo']; ?><br>
                        <?php echo $item['descricao_cla']; ?><br>
                        <?php echo $item['descricao']; ?><br>
                    </div>
            </section>
            <a href="<?php echo base_url('tombo/cadastro/' . $item['idcatalago']); ?>" ><button class="btn bg-black "><i class="fa  fa-retweet"></i>Tombar</button></a>
            <a href="<?php echo base_url('catalogo/editar/' . $item['idcatalago']); ?>" ><button class="btn bg-black  "><i class="fa   fa-pencil-square-o"></i>Editar</button></a>
            <a href="<?php echo base_url('catalogo/exemplares/' . $item['idcatalago']); ?>" ><button class="btn bg-black  "><i class="fa fa-share-square"></i>Exemplares - Tombos</button></a>
        </div>
                   
        <?php
    }
    ?>
    </tbody>

    </table>

</div>
</div>

<?php
}








