
<div class="login-box">
    <div class="login-logo">
        <b><img src="<?php echo base_url('assets/img/capaologo.jpg')?>"  height="100px" width="80"  alt=""></b></a>
    </div>
    
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Entre com seu usuario para acessar o sistema</p>

        <form action="<?= base_url('Conta/entrar')?>" method="post">
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



