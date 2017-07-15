
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastros de Cidade</h3>
                <input type="hidden" name="captcha">
            </div>
            <?php if ($alerta) { ?>
                <div class=" alert alert-success-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php } ?>

            <style type="text/css">
                input#uf_cidade {
                    text-transform: uppercase;
                }
            </style>
            <!-- Horizontal Form -->

            <form class="form-horizontal" action="<?php echo base_url('cidade/cadastrar'); ?>" method="post">
                <div class="col-md-6">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Nome*</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nome_cidade"  name="nome_cidade" placeholder="Nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <span for="cuter" class="col-sm-2 control-label">Uf</span>

                            <div class="col-sm-10">
                                <input type="text"  class="form-control" id="uf_cidade"  name="uf_cidade" placeholder="UF" size="2">
                            </div>
                        </div>
                            <button type="reset"  class="btn bg-black  btn-sm btn-flat">Cancelar</button>
                            <button type="submit" name="cadastrar"  value="cadastrar" class="btn btn-success  btn-sm btn-flat">Cadastar</button>
                        <label for=""><i> * Todos os campos em negrito sao obrigatórios</i></label>
                    </div>
                </div>

    <!-- /.box-body -->
    <div class="box-footer">



    <!-- /.box-footer -->
    </form>
    </div>
