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
                            <?php if ($mostrarecibo) { ?>
                            <div class="row" style="text-align: left">
                                <p>==================================================================</p>
                                <p style="text-align: center">COMPROVANTE DE EMPRESTIMO</p>
                                <p>==================================================================</p>
                            </div>
                            <div class="row">
                                <p>Data:<?php echo date('d-m-Y', strtotime($mostrarecibo['dataret']));?></p>
                                <p>Nome:<?php echo $mostrarecibo['aluno_idaluno']?></p>
                                <p>==================================================================</p>
                            </div>
                            <div class="row">
                                <p>Devolver em:<?php echo date('d-m-Y', strtotime($mostrarecibo['datadev']));?></p>
                                <p>Dados do Item Emprestado:<?php echo $mostrarecibo['id_tombo'];?></p>
                                <p>==================================================================</p>
                            </div>
                            <div class="row" style="text-align: justify">
                                Ao aceitar este empréstimo estou ciente das
                                sanções quie estarei sujeito
                                quando os prazos e
                                termos de devolução nao forem cumpridos
                                <p>==================================================================</p><br><br>
                            </div>
                            <div class="row" style="text-align: center">
                                <p>Assinatura do Usuario</p>
                                <p>Grato pela preferencia. Volte empre!</p>
                                <p>==================================================================</p>
                            </div>

                            <div class="row" style="align-items: center">
                                <button   class="btn btn-success btn-flat" onclick="window.print(); return false;">Imprimir</button>
                                <button class="btn btn-success btn-flat">Finalizar Somente</button>
                            </div>
                            <br>

                        </div>
                        <?php } ?>



                    </div>

            



           