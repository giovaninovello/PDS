
<div class="ui one column doubling   container  ">
    <h2 class="ui blue dividing header">Editar Usuarios </h2>

    <?php if ($alerta) { ?>
        <div class="ui message-<?php echo $alerta['class']; ?>">
            <?php echo $alerta['mensagem']; ?>
        </div>
    <?php } ?>

    <?php if ($usuario) { ?>
        <form action="<?php echo base_url('usuario/editar/' . $usuario['idusuarios']); ?>" method="post">
            <input type="hidden" name="captcha">
            <input type="hidden" name="id_usuario" value="<?php echo $usuario['idusuarios']; ?>">
            <div class="ui very small form ">
                <div class="ui one column grid">
                    <di class="column">
                        <div class=" inline eight  fields ">
                            <div class="field">
                                <label>Nome</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="nome"  id="nome" placeholder="Nome" value='<?php echo $usuario['nome']; ?>'>
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>Email</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="email"  id="email" placeholder="Email" value='<?php echo $usuario['email']; ?>'>
                            </div>
                        </div>
                        <div class="inline eight  fields">
                            <div class="field">
                                <label>Senha</label>
                            </div>
                            <div class="three wide field">
                                <input type="password" name="senha" class="form-control" id="email" placeholder="senha" required="">
                            </div>
                        </div>
                        <div class=" inline eight  fields">
                            <div class="five field">
                                <label>Confirmar Senha</label>
                            </div>
                            <div class="three wide field">
                                <input type="password" name="confirmar_senha"class="form-control" id="confirmar_senha" placeholder="Confirmar senha" required="">
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>Tipo de Usuario</label>
                            </div>
                            <div class="three wide field">
                                <select  name="tipo" id="tipo" class="ui fluid dropdown">
                                    <option value="0" >Selecione o tipo de Usuario</option>
                                    <option value="1"> Administrador </option>
                                    <option value="2"> Usuário </option>
                                </select
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