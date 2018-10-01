$(function(){
    
//    alert ('WOW');
    
    $('#mail').blur(function(){

//        alert ('WOW');

        if($(this).val().length > 1){

            $.ajax({

                url:'check_mail.php?mail='+$(this).val(),

                success: function(s){

                    if(s==='Y'){
                        $('#mailSpan').html(' Ten e-mail jest już w naszej bazie :)').css('color','orange').css('font-weight','bold');
                    } 
                },

                error:function(e){

                    alert('Connection error');

                }

            });

        }

    });
    
});
