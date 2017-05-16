<div class="fundo">
<div class="login-box  " style="border: 1px solid black">
    <div class="login-logo">
        <b>Login</b></a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Entre com seu usuario para acessar o sistema</p>

        <form action="<?= base_url('conta/entrar')?>" method="post">
            <div class="form-group has-feedback">
                <input type="email"  name="email"  id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" required="">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Password" value="<?php echo set_value('senha'); ?>"required="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit"  name="entrar" value="entrar" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
</div>
</div>



