<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-info">
            <div class="box-header ">

            <form action="<?php echo base_url('etiquetas/gerar')?>" method="post">
        <!--lopop do tombo !-->

        <?php
        if($etiqueta) {

            foreach ($etiqueta as $item) { ?>

                <div class="col-md-1">
                    <div class="col-md-2 col-sm-1 ">

                        <input type="checkbox" name="modulo[]" value="<?php echo $item['idtombo'] ?>" class="fa-check" style="margin-left: 20px">
                        <img  width="60" height="80" src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>"
                        <br>

                    <div id="div1">
                        <b><?php echo $item['idtombo']; ?></b>
                        <?php echo $item['exemplar']; ?>
                        <?php echo $item['cutter']; ?>


                    </div>
                    </div>
                    <br>
                </div>


            <?php }?>
            <br>
        <?php }?>

    </div>

    <br><br>
    
    <div class="box-footer">
    <div class="col-sm-1">
        <button type="submit" class="btn bg-green  btn-md btn-flat "   >Gerar Etiquetas</button>
    </div>

        <div class="col-md-12">
            <label for=""><i> * O primeiro numeral indica o numero do tombo e o segundo indica o numero do exemplar</i></label>
        </div>

        <style type="text/css">
        #div1 {
        margin-left: 10px;
            text-align: center;
        }
        </style>







