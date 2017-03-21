<div class="ui  column  grid container center  " >
    <div class="ui one column doubling  container  ">
        <h3 class="ui blue dividing header"> Pesquisar </h3>
        <div class="ui form">
            <div class="inline fields">
                <label>Pesquisar por: </label>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="frequency" checked="checked">
                        <label>Nome</label>
                    </div>

                </div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="frequency">
                        <label>Tombo</label>
                    </div>
                </div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field">

                    <div class="ui radio checkbox">
                        <input type="radio" name="frequency">
                        <label>Autor</label>
                    </div>
                </div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field"></div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="frequency">
                        <label>Assunto</label>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?= base_url()?>catalogo/pesquisar" method="post">
            <div class="ui  form">
                <div class="column">
                    <div class="fields ">
                        <div class=" ui right pointing blue label ">
                            Digite aqui sua pesquisa
                        </div>
                        <div class="thirteen wide field">
                            <input type="text"name="pesquisar"  id="pesquisar" required="" placeholder="Digite aqui sua pesquisa">
                        </div>
                        <div class="item right">
                            <div class="  ui  icon buttons">
                                <a href=""><button class=" ui icon green button"  type="submit"  id="load" onclick="loading()"><i class="checkmark icon "></i></button></a>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </form>
        <br><br><br><br><br><br>
        <h4>Ultimos Cadastros Realizados no Sistema</h4>
        <?php

            foreach ($catalogo as $item) { ?>
                <tr align="center">
                    <td><h2 class="ui image center header aligned" ><img src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>"class="ui image "></h2></td>
                </tr>
                <?php

        }
        ?>
        <br><br><br><br><br><br>


</div>







        