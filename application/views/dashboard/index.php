<div class="ui  column  grid container center  " >
    <div class="ui one column doubling  container  ">
        <h3 class="ui blue dividing header"> Pesquisar </h3>
        <script>
            function loading() {
                $("#load").addClass("loading");
                setTimeout(function(){
                    $("#load").removeClass("loading");
                },3000);
            }
        </script>
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
        <div class="ui form">
            <div class="inline fields">
                <label>How often do you use checkboxes?</label>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="frequency" checked="checked">
                        <label>Once a week</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="frequency">
                        <label>2-3 times a week</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="frequency">
                        <label>Once a day</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="frequency">
                        <label>Twice a day</label>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>






        