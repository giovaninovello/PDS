
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <div class="box-body">
        <div class="box box-info">
            <div class="box-header ">
                <h3 class="box-title">Pesquisa de Emprestimos Realizados por Data</h3>
                <input type="hidden" name="captcha">
            </div>
            <?php if ($alerta) { ?>
                <div class=" alert alert-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <br>
            <div class="box-header ">
                <label for="cod" class="col-sm-3 control-label">Pesquisar por Data de Emprestimo:</label>
                <script>
                    $(function() {

                        $(".datepicker").datepicker({
                            showOn: "button",
                            buttonImageOnly: true,
                            buttonImage: "<?php echo base_url('assets/img/calendario.png')?>",
                            dateFormat: 'dd/mm/yy',
                            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                            nextText: 'Próximo',
                            prevText: 'Anterior'
                        });
                    });
                </script>
                <div class="form-horizontal">
                    <form action="<?= base_url()?>emprestimos/v_emprestado_data" method="post">
                        <!-- radio -->
                        <div class="form-group">
                            <p>Data Inicial:
                                <input type="text" id="datai"name="datai" class="datepicker">
                            Data Final:
                                <input type="text"  id="dataf" name="dataf" class="datepicker">
                                <button type="submit"  class="btn btn-success btn-sm ">Pesquisar</button>
                            </p>

                            </div>

                        </div>



                        </div>
                </div>