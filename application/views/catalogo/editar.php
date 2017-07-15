
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edição de Exemplares</h3>
            </div>
            <!-- Horizontal Form -->
            <?php if ($alerta) { ?>
                <div class="alert alert-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <?php if ($item ) { ?>
            <form class="form-horizontal" <?php echo form_open_multipart('catalogo/editar/' . $item['idcatalago']); ?>
            <input type="hidden" name="captcha">
            <input type="hidden" name="id_cat" value="<?php echo $item['idcatalago']; ?>">
            <div class="col-md-6">

                <div class="box-body">
                    <div class="form-group">
                        <label for="cod" class="col-sm-2 control-label">Código</label>

                        <div class="col-sm-3">
                            <input type="text"  class="form-control" name="cod" id="cod" placeholder="Codigo"
                                   value='<?php echo $item['idcatalago']; ?>' disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cuter" class="col-sm-2 control-label">Cutter</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="cuter" id="cuter" placeholder="Cutter"
                                   value='<?php echo $item['cutter']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="classificacao" class="col-sm-2 control-label">Classificaçao</label>

                        <!-- select -->
                        <div class="col-sm-6">
                            <select class="form-control" name="classificacao" id="classificacao">
                                <?php foreach ($cla as $classificacao) {
                                    if ($classificacao['idclassificacao'] == $item['classificacao_idclassificacao']) {
                                        ?>
                                        <option
                                        <option value="<?= $classificacao['idclassificacao'] ?>" selected=""> <?= $classificacao['descricao_cla']; ?> </option>
                                    <?php } else { ?>
                                        <option
                                            value="<?= $classificacao['idclassificacao'] ?>"> <?= $classificacao['descricao_cla']; ?> </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="classificacao" class="col-sm-2 control-label">Autores</label>

                        <!-- select -->
                        <div class="col-sm-4">
                            <select class="form-control" name="aut" id="aut">
                                <?php foreach ($aut as $autor) {
                                    if ($autor['idautor'] == $autores_has['autor_idautor']) {
                                        ?>
                                        <option value="<?= $autor['idautor'] ?>" selected=""> <?= $autor['nome_aut']; ?> </option>
                                    <?php } else { ?>
                                        <option
                                            value="<?= $autor['idautor'] ?>"> <?= $autor['nome_aut']; ?> </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="titulo"  id="titulo" placeholder="Titulo" value='<?php echo $item['titulo']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Subtitulo</label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitulo"  id="subtitulo" placeholder="SubTitulo" value='<?php echo $item['subtitulo']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Edição</label>

                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="edicao"  id="edicao" placeholder="Edição" value='<?php echo $item['edicao']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Paginas</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="totalpagina"  id="totalpagina" placeholder="" value='<?php echo $item['total_pag']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Cidade</label>

                        <!-- select -->
                        <div class="col-sm-5">
                            <select class="form-control" name="cid" id="cid">
                                <?php
                                foreach ($cid as $cidade) {
                                    if ($cidade['idcidade'] == $item['cidade_idcidade']) {
                                        ?>
                                        <option value="<?= $cidade['idcidade'] ?>" selected=""> <?= $cidade['nome']; ?> </option>
                                    <?php } else { ?>
                                        <option value="<?= $cidade['idcidade'] ?>"> <?= $cidade['nome']; ?> </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Volume</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="volume"  id="volume" placeholder="" value='<?php echo $item['volume']; ?>'>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">ISSN</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="issn"  id="issn" placeholder="ISSN" value='<?php echo $item['issn']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tipo de documento</label>

                        <div class="col-sm-5">
                            <select class="form-control" name="tipo" id="tipo">
                                <?php foreach ($tipo as $tipo_documemto) {
                                    if ($tipo_documemto['idtipo_documento'] == $item['tipo_documemto_idtipo_documento']) {
                                        ?>
                                        <option
                                            value="<?= $tipo_documemto['idtipo_documento'] ?>" selected=""> <?= $tipo_documemto['descricao']; ?> </option>
                                    <?php } else { ?>
                                        <option
                                            value="<?= $tipo_documemto['idtipo_documento'] ?>"> <?= $tipo_documemto['descricao']; ?> </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nota de Serie</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nota_serie"  id="nota_serie" placeholder="Nota de Serie" value='<?php echo $item['nota_serie']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">ISBN</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="isbn"  id="isbn" placeholder="ISBN" value='<?php echo $item['isbn']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Editora</label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="editora"  id="editora" placeholder="Editora" value='<?php echo $item['editora']; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Data da publicação</label>

                        <div class="col-sm-5">
                            <input type="text"  class="form-control" class="data" name="datapub"  id="datapub" placeholder="Data de Publicação" value='<?php echo date('d/m/Y',strtotime($item['data_public'])); ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Imagem</label>

                        <div class="col-sm-9">
                            <input type="file" class="small"  id="nome_arquivo" name="nome_arquivo" ><br>
                            <img alt="150x100" width="50" height="80" src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Observações</label>

                        <!-- textarea -->
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Enter ..." id="obs" name="obs"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fasciculo</label>

                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="fasciculo"  id="fasciculo" placeholder="Fasciculo" value='<?php echo $item['fasciculo']; ?>'>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">


            </div>
            <div class="box-footer">


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="btn bg-black btn-sm btn-flat">voltar</a>
                <button type="submit"  name="editar" value="editar" class="btn btn-success  btn-sm btn-flat">Salvar Alterações</button>

                <!-- /.box-footer -->
                </form>
                <?php } ?>
            </div>
