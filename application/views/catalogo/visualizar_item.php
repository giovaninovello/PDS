<div class="ui one column doubling  container  ">
    <h3 class="ui blue dividing header">Visualizar Item </h3>
    <?php
    if($catalogo) {
    
    foreach ($catalogo as $item) { ?>
        <table class=" ui very small  ">
            <div class=" ui right pointing blue label ">
                <b>
                    <?php echo $item['nome_aut']; ?>/
                    <?php echo $item['descricao_cla']; ?>/
                    <?php echo $item['cutter']; ?>/
                    <?php echo $item['titulo']; ?>/
                    <?php echo $item['nome']; ?>/
                    <?php echo $item['descricao']; ?></b>
            </div>
        </table>
        <br>
        <a href="<?php echo base_url('catalogo/deletar/' . $item['idcatalago']); ?>" onclick="return confirm('Deseja deletar este usuario?');"><button class="mini ui  green button"> Excluir Item</button></a>
        <a href="<?php echo base_url('tombo/cadastro/' . $item['idcatalago']); ?>" ><button class="mini ui  green button"> Tombar</button></a>
        <a href="<?php echo base_url('catalogo//' . $item['idcatalago']); ?>" ><button class="mini ui  green button"> Copiar</button></a>
        <a href="<?php echo base_url('catalogo//' . $item['idcatalago']); ?>" ><button class="mini ui  green button"> Editar</button></a>
        <a href="<?php echo base_url('catalogo/exemplares/' . $item['idcatalago']); ?>" ><button class="mini ui  black button"> Exemplares - Tombos</button></a>
        <div class="ui items ">
            <div class="item">
                <div class="ui tiny image">
                    <img src="<?php echo base_url('assets/uploads/' . $item['nome_imagem']); ?>">
                </div>
                <div class="content">
                    <i class="large green checkmark icon"></i>
                    <a class="header"> <?php echo $item['titulo']; ?><br></a>
                    <div class="meta">
                        <i class="large green checkmark icon"></i>
                        <span> <?php echo $item['descricao_cla']; ?><br></span>
                    </div>
                    <div class="description">
                        <p></p>
                    </div>
                    <div class="content">
                        <div class="ui two column grid container ">
                            <div class="two wide column ">
                                <b>Titulo</b><br>
                                <b>Subtitulo</b><br>
                                <b>Cutter</b><br>
                                <b>Edicao</b><br>
                                <b>Paginas</b><br>
                                <b>Volume</b><br>
                                <b>Colecao</b><br>
                                <b>ISBN</b><br>
                                <b>Editora</b><br>
                                <b>Data Publicacao</b><br>
                                <b>Fasciculo</b><br>
                                <b>ISSN</b><br>
                                <b>Cidade</b><br>
                                <b>Classificação</b><br>
                                <b>Tipo</b><br>
                            </div>
                            <div class="seven wide column">
                                <?php echo $item['titulo']; ?><br>
                                <?php echo $item['subtitulo']; ?><br>
                                <?php echo $item['cutter']; ?><br>
                                <?php echo $item['edicao']; ?><br>
                                <?php echo $item['total_pag']; ?><br>
                                <?php echo $item['volume']; ?><br>
                                <?php echo $item['nota_serie']; ?><br>
                                <?php echo $item['isbn']; ?><br>
                                <?php echo $item['editora']; ?><br>
                                <?php echo $item['data_public']; ?><br>
                                <?php echo $item['fasciculo']; ?><br>
                                <?php echo $item['issn']; ?><br>
                                <?php echo $item['nome']; ?><br>
                                <?php echo $item['descricao_cla']; ?><br>
                                <?php echo $item['descricao']; ?><br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <?php
    }
    ?>
    </tbody>
    </table>
    <h3 class="ui blue dividing header"></h3>

</div>


<?php
}







