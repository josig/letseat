$(function(){
    $('#transaction-form').submit(function(evento){
        var route = $('#transaction-form').data('route');
        //var form_data = $(this);
        //$('.alert-danger').remove();
        //$('.alert-success').remove();
        $('.msg').remove();
        $('#messages').removeClass('alert-danger');
        $('#messages').removeClass('alert-success');
        
        $.ajax({
           type: "POST",
           url: route,
           //data: form_data.serialize(),
           data: new FormData(this),
           dataType: "json",
           contentType: false,
           cache: false,
           processData: false,
           beforeSend: function () {
               $('#loading').show();
               $("#loading").html("<img src='images/icon_loading2.gif' /><br />Procesando, espere por favor...");
            },
           success: function(Response)
           {
               console.log(Response);

               $('#loading').hide();
               $('#messages').removeClass('alert-danger');
               $('#messages').addClass('alert-success');

               if(Response.success){
                   $('#messages').append('<div class="msg">'+ Response.success +'</div>');
                }
                else{
                    $('#messages').append('<div class="msg">Error</div>');
                }
               /*if(Response.name){
                   $('#messages').append('<li class="alert">'+ Response.name +'</li>');
               }
               */

               /*if(data.resultado === true)
               {
                   $("#resultado2").hide();
                   $("#panelSocio").hide();
                   $("#resultado").html("<h2>" + data.message + "</h2>");
                }
                else
                {
                    $("#resultado2").hide();
                    alert(data.message);
                }*/
               
            },
            error: function(data){
                console.log(data);
                $('#loading').hide();
                if(data.status === 422){
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value){
                        console.log(key+ " " +value);
                        $('#messages').addClass("alert-danger");
                        
                        if($.isPlainObject(value)){
                            $.each(value, function (key, value){
                                console.log(key+ " " +value);
                                $('#messages').append('<div class="msg">'+value+'</div>');
                            });
                        }else{
                            $('#messages').append('<div class="msg">'+value+'</div>'); //this is my div with messages
                        }
                    })
                }
            }
        });

        evento.preventDefault();

    });



});