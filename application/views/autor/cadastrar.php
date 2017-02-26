<div class="ui one column doubling   container c ">
    <h3 class="ui blue dividing header">Cadastrar Autores </h3>

    <?php if ($alerta) { ?>
        <div class="ui message-<?php echo $alerta['class']; ?>">
            <?php echo $alerta['mensagem']; ?>
        </div>
    <?php } ?>

    <?php echo form_open_multipart('autor/cadastrar'); ?>
    <input type="hidden" name="captcha">
    <div class="ui  form ">
        <div class="ui one column grid">
            <div class="column">
                <div class=" inline eight fields ">
                    <div class=" field">
                        <label>Codigo</label>
                    </div>
                    <div class="two wide field">
                        <input type="text"name="cod"  id="cod" placeholder="Codigo" value='' disabled="true">
                    </div>
                </div>
                <div class="  inline eight fields ">
                    <div class="required  field">
                        <label>Nome</label>
                    </div>
                    <div class="eight wide  field">
                        <input type="text"name="nome"  id="nome" placeholder="Nome" value=''>
                    </div>
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


        <div class="sixteen wide column">
            <div class="fields">
                <div class="field">
                    <a href="<?php echo base_url('dashboard'); ?>" type="submit" class=" mini ui  red button  ">voltar</a>
                    <button type="submit"  name="cadastrar" value="cadastrar"class=" mini ui  blue   button ">Cadastrar </button>
                </div>
            </div>

        </div>
    </div>
</div>






















