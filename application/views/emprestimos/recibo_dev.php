<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Emprestimos</h3>
                <input type="hidden" name="captcha">
            </div>

            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

                    <div  class="container-fluid" style="margin-left: 25%">
                        <div  class="col-sm-5">
                            <?php if ($recibo) { ?>
                            <div class="row" style="text-align: left">
                                <p>==================================================================</p>
                                <p style="text-align: center">COMPROVANTE DE DEVOLUCAO</p>
                                <p>==================================================================</p>
                            </div>
                            <div class="row">
                                <p>Data:__<?php echo $recibo['datadev'];?></p>
                                <p>Nome:__<?php echo $recibo['aluno_idaluno']?></p>
                                <p>==================================================================</p>
                            </div>
                            <div class="row">
                                <p>Devolver em:__<?php echo $recibo['datadevolucaoreal'];?></p>
                                <p>Dados do Item Emprestado:__<?php echo $recibo['id_tombo'];?></p>
                                <p>==================================================================</p>
                            </div>
                            <div class="row" style="text-align: center">
                                <p>Assinatura do Usuario</p>
                                <p>Grato pela preferencia. Volte empre!</p>
                                <p>==================================================================</p><br><br><br>
                            </div>

                            <div class="row" style="align-items: center">
                                <button   class="btn btn-success btn-flat" onclick="window.print(); return false;">Imprimir</button>
                                <a href="<?php echo base_url('dashboard'); ?>"><button   class="btn btn-success btn-flat">Finalizar Somente</button></a>
                            </div>
                            <br>

                        </div>
                        <?php } ?>



                    </div>

            



           