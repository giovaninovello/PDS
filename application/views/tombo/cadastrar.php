
    <div class="ui one column doubling   container  ">
        <h3 class="ui blue dividing header">Tombar Item </h3>

        <?php if ($alerta) { ?>
            <div class="ui message-<?php echo $alerta['class']; ?>">
                <?php echo $alerta['mensagem']; ?>
            </div>
        <?php } ?>
        <?php if ($cat ) { ?>
        <form action="<?php echo base_url('tombo/cadastrar/' .$cat); ?>" method="post">
            <input type="hidden" name="captcha">
            <div class="ui  form  ">
                <div class="ui one column grid">
                    <div class="column">
                        <div class=" inline eight  fields ">
                            <div class="field">
                                <label>Id_Exemplar</label>
                            </div>
                            <div class="two wide field">
                                <input type="text"name="id"  id="id" placeholder="" value='<?php echo $cat; ?>' disabled="">
                            </div>
                        </div>
                        <div class=" inline eight  fields ">
                            <div class="field">
                                <label>Tombo</label>
                            </div>
                            <div class="two wide field">
                                <input type="text"name="tbo"  id="tbo" placeholder="Numero do Tombo" value=''>
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>Data</label>
                            </div>
                            <div class="two wide field">
                                <input type="text"name="data"  id="data" placeholder="Data" value='<?php echo $data; ?>'>
                            </div>
                        </div>
                        <div class="inline eight  fields">
                            <div class="field">
                                <label>Exemplar</label>
                            </div>
                            <div class="one wide field">
                                <input type="text" name="exemplar"  id="exemplar" value='<?php echo $exemplar['exemplar']+1; ?>'>
                            </div>
                        </div>
                        <div class=" inline eight  fields">
                            <div class="five field">
                                <label>Fornecedor</label>
                            </div>
                            <div class="three wide field">
                                <select  name="fornecedor" id="fornecedor" class="  ui mini fluid dropdown">
                                    <option value="" selected="">Selecione</option>
                                    <?php foreach ($forn as $fornecedor){?>
                                        <option value="<?=$fornecedor['idfornecedor']?>"> <?=$fornecedor['endereco_f'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>Tipo de Aquisicao</label>
                            </div>
                            <div class="three wide field">
                                <select  name="classificacao" id="classificacao" class="  ui mini fluid dropdown">
                                    <option value="" selected="">Selecione</option>
                                    <?php foreach ($aqui as $aquisicao){?>
                                        <option value="<?=$aquisicao['idaquisicao']?>"> <?=$aquisicao['descricao_aqui'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <script>
                    function loading() {
                        $("#load").addClass("loading");
                        setTimeout(function(){
                            $("#load").removeClass("loading");
                        },1000);
                                            }
                </script>
                <div class="sixteen wide column">
                    <div class="fields">
                        <div class="field">
                            <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="mini ui red button">voltar</a>
                            <button type="submit"  name="cadastrar" value="cadastrar"class="mini ui  green button">Cadastrar </button>

                        </div>
                        
                    </div>
        </form>
        <?php } ?>
    </div>







     

