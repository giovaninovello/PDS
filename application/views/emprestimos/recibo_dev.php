<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="">
            <div class="box-header with-border">

                <input type="hidden" name="captcha">
            </div>



                    <div  class="container-fluid" style="margin-left: 25%">
                        <div  class="col-sm-5">
                            <?php if ($recibo) { ?>
                            <div class="row">
                                <p>=========================================</p>
                                <strong><p>COMPROVANTE DE DEVOLUCAO</p></strong>
                                <p>=========================================</p>
                            </div>
                            <div class="row">
                                <strong><p>Data:&nbsp;<?php echo date('d/m/Y', strtotime($recibo['datadev']));?></p></strong>
                                <p>Nome:&nbsp;<?php echo $aluno->nome_aluno?></p>
                                <p>==========================================</p>
                            </div>
                            <div class="row">
                               <strong><p>Devolver em:&nbsp;<?php echo date('d/m/Y', strtotime($recibo['datadevolucaoreal']));?></p></strong>
                                <p>Dados do Item Emprestado:&nbsp;<?php echo $titulo->titulo;?></p>
                                <p>==========================================</p>
                            </div>
                            <div class="row" >
                                <p>Assinatura do Usuario</p>
                                <p>Grato pela preferencia. Volte empre!</p>
                                <p>==========================================</p>
                            </div>

                            <div class="row" style="align-items: center">
                                <button class="noprint" onclick="window.print(); return false;">Imprimir</button>
                                <a class="noprint" href="<?php echo base_url('dashboard'); ?>"><button >Finalizar Somente</button></a>
                            </div>
                            <br>

                        </div>
                        <?php } ?>

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


                    </div>

            



           