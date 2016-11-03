
<div class="ui one column doubling  container  ">
    <h3 class="ui blue dividing header">Cadastrar Catalago </h3>

    <?php if ($alerta) { ?>
        <div class="ui message-<?php echo $alerta['class']; ?>">
            <?php echo $alerta['mensagem']; ?>
        </div>
    <?php } ?>

    <?php echo form_open_multipart('catalogo/cadastrar'); ?>
    <input type="hidden" name="captcha">
    <div class="ui  form  ">
        <div class="ui one column grid">
            <div class="column">
                <div class=" inline eight fields ">
                    <div class=" field">
                        <label>Codigo</label>
                    </div>
                    <div class="eight  field">
                        <input type="text"name="cod"  id="cod" placeholder="Codigo" value='' disabled="true">
                    </div>
                </div>
                <div class="  inline eight fields ">
                    <div class="required  field">
                        <label>Cutter</label>
                    </div>
                    <div class="six  field">
                        <input type="text"name="cuter"  id="cuter" placeholder="Cutter" value=''>
                    </div>
                </div>
                <div class="  inline eight fields ">
                    <div class=" field">
                        <label>Classificação</label>
                    </div>
                    <div class="six  field">
                        <select  name="classificacao" id="classificacao" class="  ui mini fluid dropdown">
                            <option value="" selected="">Selecione</option>
                            <?php foreach ($cla as $classificacao){?>
                                <option value="<?=$classificacao['idclassificacao']?>"> <?=$classificacao['descricao_cla'];?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="  inline eight fields ">
                    <div class=" field">
                        <label>Autores</label>
                    </div>
                    <div class="six wide field">
                        <select  name="aut" id="aut" class="ui fluid dropdown">
                            <option value="" selected="">Selecione</option>
                            <?php foreach ($aut as $autor){?>
                                <option value="<?=$autor['idautor']?>"><?=$autor['nome_aut'];?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Titulo</label>
                    </div>
                    <div class=" ten wide field">
                        <input type="text"name="titulo"  id="titulo" placeholder="Titulo" value=''>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Subtitulo</label>
                    </div>
                    <div class=" ten wide field">
                        <input type="text"name="subtitulo"  id="subtitulo" placeholder="SubTitulo" value=''>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Edição</label>
                    </div>
                    <div class=" two wide field">
                        <input type="text"name="edicao"  id="edicao" placeholder="Edição" value=''>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Total de Paginas</label>
                    </div>
                    <div class=" one wide field">
                        <input type="text"name="totalpagina"  id="totalpagina" placeholder="" value=''>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Cidade</label>
                    </div>
                    <div class="three wide field">
                        <select  name="cid" id="cid" class="ui fluid dropdown">
                            <option value="" selected="">Selecione</option>
                            <?php foreach ($cid as $cidade){?>
                                <option value="<?=$cidade['idcidade']?>"> <?=$cidade['nome'];?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Volume</label>
                    </div>
                    <div class=" one wide field">
                        <input type="text"name="volume"  id="volume" placeholder="" value=''>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Nota de Serie</label>
                    </div>
                    <div class=" five wide field">
                        <input type="text"name="nota_serie"  id="nota_serie" placeholder="Nota de Serie" value=''>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>ISBN</label>
                    </div>
                    <div class=" four wide field">
                        <input type="text"name="isbn"  id="isbn" placeholder="ISBN" value=''>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Editora</label>
                    </div>
                    <div class=" five wide field">
                        <input type="text"name="editora"  id="editora" placeholder="Editora" value=''>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Data Publicação</label>
                    </div>
                    <div class=" two wide field">
                        <input type="text"name="datapub"  id="datapub" placeholder="Data de Publicação" value=''>
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
                </div>

                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Observações</label>
                    </div>
                    <textarea class="ten wide field" name="obs" id="obs"></textarea>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>Fasciculo</label>
                    </div>
                    <div class=" two wide field">
                        <input type="text"name="fasciculo"  id="fasciculo" placeholder="Fasciculo" value=''>
                    </div>
                </div>
                <div class="  inline eight  fields ">
                    <div class=" field">
                        <label>ISSN</label>
                    </div>
                    <div class=" five wide field">
                        <input type="text"name="issn"  id="issn" placeholder="ISSN" value=''>
                    </div>
                </div>
                <div class=" inline eight fields">
                    <div class="field">
                        <label>Tipo de Documento</label>
                    </div>
                    <div class="three wide field">
                        <select  name="tipo" id="tipo" class="ui fluid dropdown">
                            <option value="" selected="">Selecione</option>
                            <?php foreach ($tipo as $tipo_documento){?>
                                <option value="<?=$tipo_documento['idtipo_documento']?>"> <?=$tipo_documento['descricao'];?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <script>
                    function loading() {
                        $("#load").addClass("loading");
                        setTimeout(function(){
                            $("#load").removeClass("loading");
                        },1000);
                    }

                </script>

            </div>
        </div>
    </div>
    <div class="sixteen wide column">
        <div class="fields">
            <div class="field">
                <a href="<?php echo base_url('dashboard'); ?>" type="submit" class=" mini ui  red button  ">voltar</a>
                <button type="submit"  name="cadastrar" value="cadastrar"class=" mini ui  blue   button ">Cadastrar </button>
                
            </div>
        </div>
    </div>




    <br>

</div>






     

