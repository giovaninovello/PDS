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
                    <div class="eight wide field">
                        <input type="text"name="pesquisar"  id="pesquisar" required="" placeholder="Digite aqui sua pesquisa">
                    </div>
                    <div class="item right">
                        <div class=" mini ui  icon buttons">

                        </div>
                        <a href=""><button class=" ui icon large green button"  type="submit"><i class="search  icon "></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>