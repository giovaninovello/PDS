

<div class="content-wrapper">


    <section class="content">
        <div id="noprint"><button type="submit"  onclick="window.print();" class="btn btn-success  btn-sm btn-flat">Imprimir Carteiras</button></div>
        <?php
        if($carteira) {

            $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
            foreach ($carteira as $item) {?>

               <div id="div1">

                    <?php
                    echo $generator->getBarcode($item, $generator::TYPE_CODE_128);
                    $this->load->model('aluno_model');
                    $dados = $this->Aluno_model->getnome($item);

                    $this->load->model('Escola_model');
                    $escola = $this->Escola_model->get_escola_id($dados->escola_idescola);
                    ?>


                    <img id="img1" alt="150x100" width="50" height="80" src="<?php echo base_url('assets/uploads/'. $dados->nome_imagem); ?>">
                    <img id="img" alt="150x100" width="70" height="80" src="<?php echo base_url('assets/img/capaologo.jpg')?>">
                   <?php

                   ?><br><br>
                   <div style="border: 0px solid black">
                       Nome :<?php echo $dados->nome_aluno?><br>
                       Turma: <?php echo $dados->turma_aluno?><br>
                       Escola: <?php echo $escola['nome_escola']?>
                   </div>

               </div>



            <?php }?>

        <?php }?>
    </section>
    </div>

<style type="text/css">
    #div1 {
        margin-left: 35%;
        margin-right: 35%;
        border: 1px solid black;
        alignment: center;
        margin-bottom: 40px;
        text-align: justify;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 20px;
        padding-right: 20px;

    }
    #img{
        margin-left: 50px;
    }
    #img1{
        margin-left: 50px;

    }
    @media print {
        #noprint { display:none; }
        body { background: #fff; }
    }

    }
</style>
































