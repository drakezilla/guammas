function checkUsuario(campo,spinner,accion){
    if(accion==undefined){
        accion='nuevo'
    }
    spinner.html('<img src="/images/16x16/small_spinner.gif" />');
        
    $.ajax({
        dataType: 'json',
        cache: false,
        type: 'POST',
        url: "/frontend_dev.php/usuario/checkusuario",
        data:{
            username: campo.val(),
            accion: accion
        },
        statusCode: {
            404: function() {
                $(".ui-dialog-buttonset").remove();
                $("#main-login-form").html(ajaxError);
            }
        },
        success: function(data){
            if(data.flag=='true'){
                spinner.html('<img src="/images/16x16/small_tick.png" />'+data.msg)
                return true
            }else{
                spinner.html('<img src="/images/16x16/small_cross.png" />'+data.msg)
                return false
            }
        }
    })
}

function checkEmail(campo,spinner,accion){  
    if(accion==undefined){
        accion='nuevo'
    }
    var emailPattern = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;  
    if (emailPattern.test(campo.val())){
        $.ajax({
            dataType: 'json',
            cache: false,
            type: 'POST',
            url: "/frontend_dev.php/usuario/checkemail",
            data:{
                correo: campo.val(),
                accion: accion
            },
            statusCode: {
                404: function() {
                    $(".ui-dialog-buttonset").remove();
                    $("#main-login-form").html(ajaxError);
                }
            },
            success: function(data){
                if(data.flag=='true'){
                    spinner.html('<img src="/images/16x16/small_tick.png" />'+data.msg)
                    return true
                }else{
                    spinner.html('<img src="/images/16x16/small_cross.png" />'+data.msg)
                    return false
                }
            }
        })
    }else{
        spinner.html('<img src="/images/16x16/small_cross.png" /> Este correo electronico no es valido');
        return false
    }  
}