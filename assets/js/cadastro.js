/**
 * Created by Giovani on 25/04/2017.
 */
$(document).ready(function () {

    var load = $(".load");



    $("#cadastrar").click(function () {

        $.ajax({

            beforeSend: function () {
                load.fadeIn('fast');
            },
            success: function () {

                load.fadeOut('fast', function () {

                });
            }

        });
        
        return false;
    });


});