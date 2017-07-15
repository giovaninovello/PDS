/**
 * Created by Giovani on 25/04/2017.
 */
$(document).ready(function () {

    var load = $(".load");
    var retorno = $('.retorno');

    $('#abrir').click(function () {
        $('#minhaModal').modal('show');
    });


    


    $("#buscar").click(function () {

        var termo = $('input[name="pesquisar"]').val();

        $.ajax({
            url: "../aluno/pesquisa_ajax",
            type: 'POST',
            data: 'termo=' + termo + '&acao=buscar',
            beforeSend: function () {
                load.fadeIn('fast');
            },
            success: function (data) {

                load.fadeOut('fast', function () {

                    $(".retorno").html(data);


                });
            }

        });


        return false;
    });

    retorno.on('click', '#usuario', function () {
        var iduser = $(this).attr('data-target');

        $.ajax({
            url: "../aluno/pesquisa_ajax",
            type: 'POST',
            data: 'iduser=' + iduser + '&acao=retornar',
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {

                console.log(data.idaluno);
                $('input[name="nome_aluno"]').val(data.nome_aluno);
                $('input[name="id_aluno"]').val(data.idaluno);
                $('#minhaModal').modal('hide');
                $(".retorno").html('');
                var termo = $('input[name="pesquisar"]').val('');



            }


        });


    });
    return false;

});