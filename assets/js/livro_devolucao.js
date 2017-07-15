/**
 * Created by Giovani on 25/04/2017.
 */
$(document).ready(function () {

    var load =$(".load");
    var retorno_dev = $('.retorno_dev');

    $('#abrir_devolucao').click(function () {
        $('#minhaModal_livro_devolucao').modal('show');
    });

    $('#confirmar').click(function () {
        $('#minhaModal_confirmacao').modal('show');
    });




    $("#buscar_emprestimo").click(function () {

        var termo = $('input[name="pesquisar_tombo"]').val();

        $.ajax({
           url:"../tombo/pesquisa_ajax_tombo",
            type:'POST',
            data: 'termo='+termo+'&acao=buscar',
            beforeSend:function () {
                load.fadeIn('fast');
            },
            success: function (data) {
                load.fadeOut('fast',function () {
                    $(".retorno_dev").html(data);


                });
            }

        });



        return false;
    });

    retorno_dev.on('click','#emp',function () {
        var idtombo=$(this).attr('data-target');
        console.log(idtombo);
        $.ajax({
            url:"../tombo/pesquisa_ajax_tombo",
            type:'POST',
            data:'id_tombo='+idtombo+'&acao=retornar',
            dataType:'json',
            beforeSend: function () {


            },
            success:function (data) {

                $('input[name="idretirada"]').val(data.idretirada);
                $('input[name="titulo"]').val(data.titulo);
                $('input[name="dataret"]').val(data.dataret);
                $('input[name="datadevolucaoreal"]').val(data.datadev);
                var imagem = $('#img').text(data.nome_imagem);
                $('input[name="id_tombo"]').val(data.id_tombo);
                $('input[name="aluno_nome"]').val(data.nome_aluno);
                $('input[name="idaluno"]').val(data.idaluno);
                $('input[name="titulo"]').val(data.titulo);




                $('#minhaModal_livro_devolucao').modal('hide');
                $(".retorno").html('');
                var termo = $('input[name="pesquisar_tombo"]').val('');
            }
        });
        
 


        });
        return false;

});