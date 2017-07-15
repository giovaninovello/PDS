
<div class="content-wrapper">
    <section class="content">
        <div id="noprint"><button type="submit"  onclick="window.print();" class="btn btn-success  btn-sm btn-flat">Imprimir Etiquetas</button></div>
        <br><br>



        <?php
        if($barcode) {

            foreach ($barcode as $item) {?>
               <div id="div1">
                    <?php $generator = new Picqer\Barcode\BarcodeGeneratorSVG();?>
                    <?php echo $generator->getBarcode($item, $generator::TYPE_CODE_128); ?><br>
                    <?php echo $item?>
                    <?php
                    $this->load->model('catalago_model');
                    $dados = $this->Catalago_model->getcutter($item);?><br><br>
                    <div style="border: 1px solid black"><?php echo $dados->cutter?></div>


               </div>
            <?php }?>
        <?php }?>
        </section>

    </div>




<style type="text/css">
    #div1 {
        position: relative;
        float: left;
        margin-left: 10px;
        margin-bottom: 10px;
        margin-right: 10px;
        text-align: center;

    }
    @media print {
        #noprint { display:none; }
        body { background: #fff; }
    }
</style>
































