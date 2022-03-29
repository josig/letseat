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
               if(Response.lastname){
                   $('#messages').append('<li class="alert">'+ Response.lastname +'</li>');
                }
                if(Response.birthday){
                    $('#messages').append('<li class="alert">'+ Response.birthday +'</li>');
                }
                if(Response.nationality){
                    $('#messages').append('<li class="alert ">'+ Response.nationality +'</li>');
                }
                if(Response.gender){
                    $('#messages').append('<li class="alert">'+ Response.gender +'</li>');
                }
                if(Response.governmentIdType){
                    $('#messages').append('<li class="alert">'+ Response.governmentIdType +'</li>');
                }
                if(Response.governmentId){
                    $('#messages').append('<li class="alert">'+ Response.governmentId +'</li>');
                }
                if(Response.mobile){
                    $('#messages').append('<li class="alert">'+ Response.mobile +'</li>');
                }
                if(Response.email){
                    $('#messages').append('<li class="alert">'+ Response.email +'</li>');
                }
                if(Response.address){
                    $('#messages').append('<li class="alert">'+ Response.address +'</li>');
                }
                if(Response.location){
                    $('#messages').append('<li class="alert">'+ Response.location +'</li>');
                }
                if(Response.zipcode){
                    $('#messages').append('<li class="alert">'+ Response.zipcode +'</li>');
                }
                if(Response.state){
                    $('#messages').append('<li class="alert">'+ Response.state +'</li>');
                }
                if(Response.country){
                    $('#messages').append('<li class="alert">'+ Response.country +'</li>');
                }
                if(Response.elementarySchoolStatus){
                    $('#messages').append('<li class="alert">'+ Response.elementarySchoolStatus +'</li>');
                }
                if(Response.elementarySchoolInstitution){
                    $('#messages').append('<li class="alert">'+ Response.elementarySchoolInstitution +'</li>');
                }
                if(Response.highSchoolStatus){
                    $('#messages').append('<li class="alert">'+ Response.highSchoolStatus +'</li>');
                }
                if(Response.highSchoolInstitution){
                    $('#messages').append('<li class="alert">'+ Response.highSchoolInstitution +'</li>');
                }
                if(Response.collegeStatus){
                    $('#messages').append('<li class="alert">'+ Response.collegeStatus +'</li>');
                }
                if(Response.collegeInstitution){
                    $('#messages').append('<li class="alert">'+ Response.collegeInstitution +'</li>');
                }
                if(Response.experience){
                    $('#messages').append('<li class="alert">'+ Response.experience +'</li>');
                }
                if(Response.referenceName){
                    $('#messages').append('<li class="alert">'+ Response.referenceName +'</li>');
                }
                if(Response.referenceMobile){
                    $('#messages').append('<li class="alert">'+ Response.referenceMobile +'</li>');
                }
                if(Response.cvFile){
                    $('#messages').append('<li class="alert">'+ Response.cvFile +'</li>');
                }
                if(Response.message){
                    $('#messages').append('<li class="alert">'+ Response.message +'</li>');
                }

                if(Response.success){
                    $('#messages').append('<li class="alert">'+ Response.success +'</li>');
                }*/

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