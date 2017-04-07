


    <div class="ui one column doubling   container  ">
        <h3 class="ui blue dividing header">Cadastrar Usuarios </h3>

        <?php if ($alerta) { ?>
            <div class="ui message-<?php echo $alerta['class']; ?>">
                <?php echo $alerta['mensagem']; ?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url('usuario/cadastrar'); ?>" method="post">
            <input type="hidden" name="captcha">
            <div class="ui  form  ">
                <div class="ui one column grid">
                    <div class="column">
                        <div class=" inline eight  fields ">
                            <div class="field">
                                <label>Nome</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="nome"  id="nome" placeholder="Nome" value=''>
                            </div>
                        </div>
                        <div class=" inline eight fields">
                            <div class="field">
                                <label>Email</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="email"  id="email" placeholder="Email" value=''>
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

                    </div>
                    <div class="ui buttons">
                        <a href="<?php echo base_url('dashboard'); ?>" type="submit" class="ui  default button">voltar</a>
                        <div class="or"></div>
                        <button class="ui positive button" type="submit"  name="cadastrar" value="cadastrar"class=" ui  blue button" onclick="loading()">Cadastrar</button>
                    </div>
        </form>

    </div>







     

