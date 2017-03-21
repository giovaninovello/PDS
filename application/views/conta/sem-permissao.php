
<!DOCTYPE html>
<html>
<head>
    <title>Acesso Negado</title>
</head>
<style>
    body {
        font-family: "Source Sans Pro", Helvetica, Arial, sans-serif;
        font-size: 15px;
        min-height: 100%;
        padding-top: 80px;
        position:relative;
        text-align: center;
       

    }

</style>
<body>
<h1 style="color: red">Usuario sem Permissão de acesso nesta area</h1>
<div class="fields">
    <div class="field">
        <a href="<?php echo base_url('dashboard'); ?>" type="submit" class=" ui default button">voltar</a>
    </div>
    <img src="<?php echo base_url('img/acesso_negado.png'); ?>" alt="">
</div>

</body>
</html>