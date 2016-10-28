<div class="ui container  ">
    <h2 class="ui center aligned icon header">
        <i class="circular user icon"></i>
        Login
    </h2>
    <div class="ui divider"></div>
    <div class="ui middle aligned center aligned grid">
        <div class="column" id="login">

            <form class="ui mini form  " action="<?php echo base_url('conta/entrar') ?>" method="post">
                <div class="message">
                    <?php if($alerta !=null) { ?>
                        <div class="ui message<?php echo $alerta['class'];?>">
                            <?php echo $alerta['mensagem'];?>
                        </div>
                    <?php }?>
                </div>
                <div class="ui stacked secondary  segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="email"  name="email"class="ui mini form" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required="">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password"  name="senha"class="form-control" id="senha" placeholder="Password" value="<?php echo set_value('senha'); ?>" required="">
                        </div>
                    </div>
                    <script>
                        function loading() {
                            $("#load").addClass("loading");
                            setTimeout(function(){
                                $("#load").removeClass("loading");
                            },10000);
                        }
                    </script>
                    <button type="submit" name="entrar" value="entrar"  id="load" class=" ui mini fluid large blue submit button " onclick="loading()">Entrar</button>
                </div>

                <div class="ui error message"></div>

            </form>


        </div>
    </div>


