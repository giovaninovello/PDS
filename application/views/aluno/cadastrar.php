<div class="ui one column doubling   container  ">
    <h3 class="ui blue dividing header">Cadastrar Alunos </h3>

    <?php if ($alerta) { ?>
        <div class="ui message-<?php echo $alerta['class']; ?>">
            <?php echo $alerta['mensagem']; ?>
        </div>
    <?php } ?>

    <?php echo form_open_multipart('aluno/cadastrar'); ?>
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
                    <div class="field">
                        <label>Nome</label>
                    </div>
                    <div class="eight wide  field">
                        <input type="text"name="nome"  id="nome" placeholder="Nome" value=''>
                    </div>
                </div>
                <div class="  inline eight fields ">
                    <div class="field">
                        <label>Serie</label>
                    </div>
                    <div class="five wide  field">
                        <input type="text"name="serie"  id="serie" placeholder="Serie" value=''>
                    </div>
                </div>
                <div class="  inline eight fields ">
                    <div class="field">
                        <label>Turma</label>
                    </div>
                    <div class="five wide  field">
                        <input type="text"name="turma"  id="turma" placeholder="Turma" value=''>
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

                </div>
                <div class="ui buttons">
                    <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="ui  default button">voltar</a>
                    <div class="or"></div>
                    <button class="ui positive button" type="submit"  name="cadastrar" value="cadastrar"class=" ui  blue button" onclick="loading()">Cadastrar</button>
                </div>
            </div>
</div>






















