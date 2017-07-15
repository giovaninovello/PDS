<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
                <input type="hidden" name="captcha">
            </div>

            <div id="div1" class="conteudo">
                <div  class="container-fluid" style="margin-left: 25%">
                    <div  class="col-sm-5">
                        <?php if ($mostrarecibo) { ?>
                        <div class="row">
                            <p>=================================================</p>
                            <strong><p >COMPROVANTE DE EMPRESTIMO</p></strong>
                            <p>=================================================</p>
                        </div>
                        <div class="row">
                            <strong><p>Data:&nbsp;<?php echo date('d/m/Y', strtotime($mostrarecibo['dataret']));?></p></strong>
                            <p>Nome:&nbsp;<?php echo $mostrarecibo['aluno_idaluno']?></p>
                            <p>=================================================</p>
                        </div>
                        <div class="row">
                            <strong><p>Devolver em:&nbsp;<?php echo date('d/m/Y', strtotime($mostrarecibo['datadev']));?></p></strong>
                            <p>Dados do Item Emprestado:&nbsp;<?php echo $mostrarecibo['id_tombo'];?></p>
                            <p>=================================================</p>
                        </div>
                        <div class="row" style="text-align: justify">
                            Ao aceitar este empréstimo estou ciente das
                            sanções que <p>estarei sujeito quando os prazos e</p>
                            termos de devolução nao <p>forem cumpridos</p>
                            <p>=================================================</p>
                        </div>
                        <div class="row" style="text-align: justify">
                            <p>Assinatura do Usuario</p>
                            <p>Grato pela preferencia. Volte empre!</p>
                            <p>=================================================</p>
                        </div>

                        <div class="row" style="align-items: center">
                            <button   onclick="window.print();"  class="noprint" class="btn btn-success  btn-sm btn-flat">Imprimir</button>
                            <a class="noprint"  href="<?php echo base_url('dashboard'); ?>"><button >Finalizar</button></a>
                        </div>
                        <br>

                    </div>
                    <?php } ?>

                </div>
            </div>
            <style type="text/css">

                #div1 {
                    text-align: justify;
                }

                @media print {
                    .noprint { display:none; }
                    body { background: #fff; }
                }

                }
            </style>



            

            



           