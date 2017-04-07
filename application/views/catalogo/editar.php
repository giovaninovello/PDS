
<div class="ui one column doubling  container  "style="padding-left: 10px">
    <h3 class="ui blue dividing header">Editar Item do Catalago </h3>

    <?php if ($alerta) { ?>
        <div class="ui message-<?php echo $alerta['class']; ?>">
            <?php echo $alerta['mensagem']; ?>
        </div>
    <?php } ?>
    <?php if ($item ) { ?>
    <?php echo form_open_multipart('catalogo/editar/' . $item['idcatalago']); ?>
            <input type="hidden" name="captcha">
            <input type="hidden" name="id_cat" value="<?php echo $item['idcatalago']; ?>">
            <div class="ui form">
                <div class="ui one column grid">
                    <div class="column">
                        <div class=" inline eight fields ">
                            <div class=" field">
                                <label>Codigo</label>
                            </div>
                            <div class="six  field">
                                <input type="text" name="cod" id="cod" placeholder="Codigo"
                                       value='<?php echo $item['idcatalago']; ?>' disabled="true">
                            </div>


                        </div>
                        <div class="  inline eight fields ">
                            <div class=" field">
                                <label>Cutter</label>
                            </div>
                            <div class="six  field">
                                <input type="text" name="cuter" id="cuter" placeholder="Cutter"
                                       value='<?php echo $item['cutter']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight fields ">
                            <div class=" field">
                                <label>Classificação</label>
                            </div>
                            <div class="six  field">
                                <select name="classificacao" id="classificacao" class="ui fluid dropdown">
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
                        <div class="  inline eight fields ">
                            <div class=" field">
                                <label>Autores</label>
                            </div>
                            <div class="six wide field">
                                <select  name="aut" id="aut" class="ui fluid dropdown">
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
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Titulo</label>
                            </div>
                            <div class=" ten wide field">
                                <input type="text"name="titulo"  id="titulo" placeholder="Titulo" value='<?php echo $item['titulo']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Subtitulo</label>
                            </div>
                            <div class=" ten wide field">
                                <input type="text"name="subtitulo"  id="subtitulo" placeholder="SubTitulo" value='<?php echo $item['subtitulo']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Edição</label>
                            </div>
                            <div class=" two wide field">
                                <input type="text"name="edicao"  id="edicao" placeholder="Edição" value='<?php echo $item['edicao']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Total de Paginas</label>
                            </div>
                            <div class=" one wide field">
                                <input type="text"name="totalpagina"  id="totalpagina" placeholder="" value='<?php echo $item['total_pag']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Cidade</label>
                            </div>
                            <div class="three wide field">
                                <select  name="cid" id="cid" class="ui fluid dropdown">
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
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Volume</label>
                            </div>
                            <div class=" one wide field">
                                <input type="text"name="volume"  id="volume" placeholder="" value='<?php echo $item['volume']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Nota de Serie</label>
                            </div>
                            <div class=" five wide field">
                                <input type="text"name="nota_serie"  id="nota_serie" placeholder="Nota de Serie" value='<?php echo $item['nota_serie']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>ISBN</label>
                            </div>
                            <div class=" four wide field">
                                <input type="text"name="isbn"  id="isbn" placeholder="ISBN" value='<?php echo $item['isbn']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Editora</label>
                            </div>
                            <div class=" five wide field">
                                <input type="text"name="editora"  id="editora" placeholder="Editora" value='<?php echo $item['editora']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Data Publicação</label>
                            </div>
                            <div class=" two wide field">
                                <input type="text" class="data" name="datapub"  id="datapub" placeholder="Data de Publicação" value='<?php echo date('d/m/Y',strtotime($item['data_public'])); ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Imagem</label>
                            </div>
                            <div>
                                <label for="nome_arquivo" class="ui icon button">
                                    <i class="file icon"></i>
                                    Selecionar Imagem</label>
                                <input type="file" id="nome_arquivo" name="nome_arquivo" style="display:none">
                            </div>
                            <div class="three wide column">
                                <td><h1 class="ui image center header aligned" id="nome_imagem"><img
                                            src="<?php echo base_url('assets/uploads/' . $item['nome_imagem']); ?>"
                                            class="ui image "></h1>
                                </td>
                            </div>
                        </div>

                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Observações</label>
                            </div>
                            <textarea class="ten wide field" name="obs" id="obs" ></textarea>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>Fasciculo</label>
                            </div>
                            <div class=" two wide field">
                                <input type="text"name="fasciculo"  id="fasciculo" placeholder="Fasciculo" value='<?php echo $item['fasciculo']; ?>'>
                            </div>
                        </div>
                        <div class="  inline eight  fields ">
                            <div class=" field">
                                <label>ISSN</label>
                            </div>
                            <div class=" five wide field">
                                <input type="text"name="issn"  id="issn" placeholder="ISSN" value='<?php echo $item['issn']; ?>'>
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>Tipo de Documento</label>
                            </div>
                            <div class="three wide field">
                                <select  name="tipo" id="tipo" class="ui fluid dropdown">
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


                        <div class="sixteen wide column">
                            <div class="fields">

                            </div>
                            <div class="ui buttons">
                                <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="ui  default button">voltar</a>
                                <div class="or"></div>
                                <button class="ui positive button" type="submit"  name="editar" value="editar"class=" ui  blue button" >Salvar Alterações</button>
                            </div>
        </form>
    <?php } ?>
</div>
