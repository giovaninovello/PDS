
<div class="ui one column doubling   container  ">
    <h2 class="ui blue dividing header">Editar Usuarios </h2>

    <?php if ($alerta) { ?>
        <div class="ui message-<?php echo $alerta['class']; ?>">
            <?php echo $alerta['mensagem']; ?>
        </div>
    <?php } ?>

    <?php if ($usuario_metodo) { ?>
        <form action="<?php echo base_url('usuario/editar_permissao/' . $usuario_metodo['id_usuario']); ?>" method="post">
            <input type="hidden" name="captcha">
            <input type="hidden" name="id_usuario" value="<?php echo $usuario_metodo['id_usuario']; ?>">
            <div class="ui form ">
                <div class="ui one column grid">
                    <di class="column">
                        <div class=" inline eight  fields ">
                            <div class="field">
                                <label>Nome</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="nome"  id="nome" placeholder="Nome" value='<?php echo $usuario_metodo['nome']; ?>'>
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>Email</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="email"  id="email" placeholder="Email" value='<?php echo $usuario_metodo['email']; ?>'>
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
                        <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="ui mini red button">voltar</a>
                        <button type="submit"  name="editar" value="editar"class="ui mini primary   button" onclick="loading()">Finalizar Edição </button>
                    </div>
                </div>
        </form>
    <?php } ?>
</div>