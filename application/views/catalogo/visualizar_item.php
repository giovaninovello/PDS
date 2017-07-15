<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        -
    </div>
    <div class="box-body">
    <?php
    if($catalogo) {
    
    foreach ($catalogo as $item) { ?>
        <div class="col-md-2" style="margin-top: 50px">
            <img alt="250x200" width="100" height="150"  src="<?php echo base_url('assets/uploads/' . $item['nome_imagem']); ?>">
        </div>
        <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="btn  btn-sm bg-black">voltar</a>
        <div class="col-sm-8">
            <section>
                <div class="alert bg-primary alert-dismissible">
                    <h4>Registro Completo</h4>
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
                        <b>Cutter</b><br>
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
                    <?php echo $item['cutter']; ?><br>
                    </div>
            </section>
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








