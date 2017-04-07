
    <div class="ui one column doubling   container  ">
        <h3 class="ui blue dividing header">Cadastrar Fornecedores </h3>

        <?php if ($alerta) { ?>
            <div class="ui message-<?php echo $alerta['class']; ?>">
                <?php echo $alerta['mensagem']; ?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url('fornecedor/cadastrar'); ?>" method="post">
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
                                <label>Endereço</label>
                            </div>
                            <div class="six wide field">
                                <input type="text"name="endereco"  id="endereco" placeholder="Endereço" value=''>
                            </div>
                        </div>
                        <div class="inline eight  fields">
                            <div class="field">
                                <label>Cidade</label>
                            </div>
                            <div class="three wide field">
                                <input type="text" name="cidade"  id="cidade" placeholder="cidade" required="">
                            </div>
                        </div>


                    </div>
                </div>

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







     

