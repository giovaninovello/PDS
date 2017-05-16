
<div class="ui one column doubling   container  ">
    <h2 class="ui blue dividing header">Editar Metodo </h2>

    <?php if ($alerta) { ?>
        <div class="ui message-<?php echo $alerta['class']; ?>">
            <?php echo $alerta['mensagem']; ?>
        </div>
    <?php } ?>

    <?php if ($metodo) { ?>
        <form action="<?php echo base_url('permissao/editar/' . $metodo['id_metodo']); ?>" method="post">
            <input type="hidden" name="captcha">
            <input type="hidden" name="id_metodo" value="<?php echo $metodo['id_metodo']; ?>">
            <div class="ui form ">
                <div class="ui one column grid">
                    <di class="column">
                        <div class=" inline eight  fields ">
                            <div class="field">
                                <label>Classe</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="classe"  id="classe" placeholder="Classe" disabled="true" value='<?php echo $metodo['classe']; ?>'>
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>Metodo</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="metodo"  id="metodo" placeholder="Metodo" disabled="disabled" value='<?php echo $metodo['metodo']; ?>'>
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>Identificacao</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="identificacao"  id="identificacao" placeholder="Identificacao" disabled="disabled" value='<?php echo $metodo['identificacao']; ?>'>
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>PRIVADO</label>
                            </div>
                            <div class="three wide field">
                                <select  name="privado" id="privado" class="ui fluid dropdown">
                                    <option value="0" >Selecione o tipo</option>
                                    <option value="1"> SIM </option>
                                    <option value="0"> NAO </option>
                                </select
                            </div>
                        </div>
                </div>
            </div>
            <br>

            <div class="sixteen wide column">
                <div class="fields">

                </div>
                <div class="ui buttons">
                    <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="ui  default button">voltar</a>
                    <div class="or"></div>
                    <button class="ui positive button" type="submit"  name="editar" value="editar"class=" ui  blue button" >Editar</button>
                </div>
        </form>
    <?php } ?>
</div>