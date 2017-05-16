/**
 * Created by Giovani on 25/04/2017.
 */
$(document).ready(function () {

    var load =$(".load");
    var retorno = $('.retorno');

    $('#abrir_livro').click(function () {
        $('#minhaModal_livro').modal('show');
    });




    $("#buscar_livro").click(function () {

        var termo = $('input[name="pesquisar_livro"]').val();

        $.ajax({
           url:"../tombo/pesquisa_ajax",
            type:'POST',
            data: 'termo='+termo+'&acao=buscar',
            beforeSend:function () {
                load.fadeIn('fast');
            },
            success: function (data) {
                console.log(data);
                load.fadeOut('fast',function () {
                    $(".retorno").html(data);
                });
            }

        });



        return false;
    });

    retorno.on('click','#livro',function () {
        var idtombo=$(this).attr('data-target');

        $.ajax({
            url:"../tombo/pesquisa_ajax",
            type:'POST',
            data:'idtombo='+idtombo+'&acao=retornar',
            dataType:'json',
            beforeSend: function () {

            },
            success:function (data) {
                console.log(data);
                $('input[name="titulo"]').val(data.titulo);
                $('input[name="id_tombo"]').val(data.idtombo);
                $('input[name="subtitulo"]').val(data.subtitulo);

                $('#minhaModal_livro').modal('hide');
                $(".retorno").html('');
                var termo = $('input[name="pesquisar_livro"]').val('');
            }
        });
        
 


        });
        return false;

});