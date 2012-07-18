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
    setTimeout(function(){
        $("#look_spinner").html("");
    },5000)
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
    setTimeout(function(){
        $("#check_email").html("");
    },5000)  
}    
$(document).ready(function(){
    $("#btn-pan-empresa").click(function(){
        if($('#pan-empresa').is(':visible')){
            $('#pan-empresa').slideUp('fast');
        }else{
            $('#pan-empresa').slideDown('fast');
            $('#pan-buscar').slideUp('fast');
        }
    })
    $("#btn-pan-buscar").click(function(){
        if($('#pan-buscar').is(':visible')){
            $('#pan-buscar').slideUp('fast');
        }else{
            $('#pan-buscar').slideDown('fast');
            $('#pan-empresa').slideUp('fast');
        }
    })
})

$(document).ready(function(){
    $(document).ready(function(){
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd-mm-yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
    })
})