<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="box">
        <div class="box-body">
            <div class="box-header  alert bg-gray-light">
                <h3 class="box-title">Tombos dos Exemplares</h3>

            </div>
            <table class="table table-responsive table-striped ">

                <thead>
                <tr>
                    <th></th>
                    <th>Escola</th>
                    <th>Titulo</th>
                    <th>Tombo</th>
                    <th>Data</th>
                    <th>Exemplar</th>
                    <th>Fornecedor</th>
                    <th>Aquisicao</th>
                    <th>Locado</th>
                    <th>Ações</th>

                    
                </tr>
                </thead>

                <tbody>
                <!--lopop do tombo !-->
                <?php
                if($catalogo) {

                    foreach ($catalogo as $item) { ?>

                        <!-- Modal  da pesquiisa de livros-->
                        <div class="modal fade" id="addhor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert bg-gray">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title " id="myModalLabel">Baixa de Itens</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('tombo/baixar');?>" method="post">
                                            <div class="form-group-sm" >
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <label for="usrname"><span class=""></span> Tombo</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="text" class="form-control" id="tombo"  name="tombo" placeholder="" readonly="true"  >
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label for="usrname"><span class=""></span> Data da Baixa</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" class="form-control" id="data" name="data" placeholder="" readonly="true"  value="<?php echo date("d/m/Y")?>">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label for="usrname"><span class=""></span> Escola</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" class="form-control" id="escola"  name="escola" placeholder="" readonly="true"  value="<?php echo $item['escola_idescola'];?>">
                                                        </div>

                                                        <img alt="150x100" width="50" height="80" src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>"
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-0">
                                                <label for="comment">Motivo da Baixa</label>
                                            </div>
                                            <textarea class="form-control" rows="5" id="motivo" name="motivo"></textarea>
                                            <br>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" id="confirmar"   class="btn btn-primary  btn-sm" >Confirmar</button>
                                    </div>
                                    <div class="modal-footer">

                                    </div>

                                </div>
                            </div>
                            </form>
                        </div>


                        <tr align="">
                            <td><img alt="150x100" width="50" height="80" src="<?php echo base_url('assets/uploads/'. $item['nome_imagem']); ?>">
                            <td><?php echo $item['escola_idescola']?></td>
                            <td><?php echo $item['titulo']; ?></td>
                            <td style="color: red"><b><?php echo $item['idtombo']; ?></b></td>
                            <td><?php echo date ('d-m-Y',strtotime($item['data_tombo'])); ?></td>
                            <td><?php echo $item['exemplar']; ?></td>
                            <td><?php echo $item['nome_f']; ?></td>
                            <td><?php echo $item['descricao_aqui']; ?></td>
                            <td><?php if( $item['locado']=="S"){
                                ?><span class="label label-danger">Emprestado</span><?php
                            }else{ ?>
                            <span class="label label-success">Disponível</span><?php
                            } ?></td>
                            <td>
                                <a href="<?php echo base_url('tombo/editar/' . $item['idtombo']); ?>"><button type="button"  class="btn  btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></button> </a>

                            <?php if($_SESSION['tipo']==1 &&  $item['locado']=="N" ){
                            ?><button type="button"  data-toggle="modal" data-target="#addhor" onclick="setaDadosModal('<?php echo $item['idtombo']?>')" class="btn  btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button></td><?php
                                }else{ ?>
                            <?php
                            } ?>
                        </tr>

                        <?php
                    }
                }else {
                    ?>

                    <?php
                }
                ?>
                </tbody>

        </div>
        </table>
        <script>
            function setaDadosModal(valor) {
                document.getElementById('tombo').value = valor;
            }
        </script>
        <script>



            $(document).ready(function ()
            {
                $('.table-striped').DataTable(
                    {
                        responsive: true,

                        "oLanguage":{
                            "responsive": "true",
                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sLengthMenu": "_MENU_ resultados por página",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sSearch": "Pesquisar",
                            "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"

                            }

                        }




                    }
                );
            });


        </script>








</div>







