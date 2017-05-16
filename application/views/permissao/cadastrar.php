
    <div class="ui one column doubling   container  ">
        <h3 class="ui blue dividing header">Cadastro de Permissões </h3>

        <?php if ($alerta) { ?>
            <div class="ui message-<?php echo $alerta['class']; ?>">
                <?php echo $alerta['mensagem']; ?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url('permissao/cadastrar'); ?>" method="post">
            <input type="hidden" name="captcha">
            <div class="ui  form  ">
                <div class="ui two column grid">
                    <div class="column">
                        <div class=" inline five  fields ">
                            <div class="field">
                                <label>Menu</label>
                            </div>
                            <div class="eight wide field">
                                <select  name="metodo_form" id="metodo_form" class="  ui mini fluid dropdown">
                                    <option value="" selected="">Selecione</option>
                                    <?php foreach ($metodo as $m){?>
                                        <option value="<?=$m['id_metodo']?>"><?=$m['identificacao'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                     <div class=" inline five  fields ">
                        <div class="field">
                            <label>Usuario Cadastrado</label>
                        </div>
                        <div class="six wide field">
                            <select  name="usuarios_form" id="usuarios_form" class="  ui mini fluid dropdown">
                                <option value="" selected="">Selecione</option>
                                <?php foreach ($usuario as $u){?>
                                    <option value="<?=$u['idusuarios']?>"> <?=$u['nome'];?> </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                </div>

                    <div class="column">
                         <a href="<?php echo base_url('permissao/visualizar_todos'); ?>" type="submit" class="ui   blue button">Mostrar Todos</a>
                    </div>
                <br>

                <div class="sixteen wide column">
                    <div class="fields">

                    </div>
                    <div class="ui buttons">
                        <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="ui  default button">voltar</a>
                        <div class="or"></div>
                        <button class="ui positive button" type="submit"  name="cadastrar" value="cadastrar"class=" ui  blue button" onclick="loading()">Cadastrar</button>
                    </div>
        </form>


    </div>







     

