<script>
var loginFormHTML ='<div id="msgs" style="display: none"></div><form id="login_form" action="usuario/login" method="post"><div><h3>Inicia sesión</h3></div><div id="login_form_username">Usuario o Email:<br /><input type="text" name="login[username]" id="login_username" /></div><div id="login_form_password">Contraseña: <br /><input type="password" name="login[password]" id="login_password" /><br /></div></form>';
var forgotFormHTML = '<form id="forgot_form" action="usuario/forgot" method="post"><div><h3>¿Olvidaste tu contraseña?</h3><br />Por favor, ingresa tu dirección de email. Reiniciaremos tu contraseña, te la enviaremos por correo y te daremos otras instrucciones. Luego podras cambiar la contraseña por la que desees!</div><hr /><div  id="login_form_username">Email:<br /><input type="text" name="forgot[email]" id="forgot_email" /></div><div></div>';
var btnArray={
    "Iniciar Sesión": function() {
        signingIn();
    },
    "Crea una cuenta nueva!": function() {
        $.ajax({
            url: '<?php echo url_for('usuario/new') ?>',
            statusCode: {
                404: function() {
                    $(".ui-dialog-buttonset").remove();
                    $("#main-login-form").html(ajaxError);
                }
            },
            success: function(data){
                $("#main-login-form").html(data);
                $(".ui-dialog-buttonset").remove();
                $("#main-login-form").dialog({
                    title: "Bienvenido!",
                    buttons: {
                        "Crea una cuenta nueva!": function() {
                            $("#bien_login_form").submit();
                        }
                    }
                })
            },
            error: function(){
                $(".ui-dialog-buttonset").remove();
                $(this).html(ajaxError);
            }
                
        })
    },
    "Olvide mi contraseña": function() {
        $(this).html(forgotFormHTML);
        $(".ui-dialog-buttonset").remove();
        $(this).dialog({
            title: "Olvide mi contraseña",
            buttons: {
                'Recuperar mi contraseña': function(){
                    $("#forgot_form").submit();
                }
            }
        })
    }
}

$(document).ready(function(){
    $("#main-search").click(function(){
        $("#main-search-box-input").show("fast");
    })
    
    $("#sys-container-daddy").click(function(){
        if($("#main-usuario-panel").is(":visible")){
            $("#main-usuario-panel").slideUp("fast");
        }
    })
    
    $("#main-micuenta").click(function(){
        if($("#main-usuario-panel").is(":visible")){
            $("#main-usuario-panel").slideUp("fast");
        }else{
            $("#main-usuario-panel").slideDown("fast");
        }
    })
    
    $("#main-login-form").dialog({
        title: "Guammas",
        autoOpen: false,
        modal: true,
        width: 540,
        open: function() {
            $(this).html(loginFormHTML);
            $(".ui-dialog-buttonset").remove();
            $(this).dialog({
                buttons: btnArray
            })
        },
        close: function() {
            $(this).html('')
        },
        buttons: btnArray
    });
    
    $("#pin-ingresa").click(function(){
        $("#main-login-form").dialog("open");
    })
})

function signingIn(){
    $.ajax({
        dataType: 'json',
        cache: false,
        type: 'POST',
        url: '<?php echo url_for('usuario/login') ?>',
        data: {
            login:{
                username: $("#login_username").val(),
                password:$("#login_password").val()
            }
        },
        statusCode: {
            404: function() {
                $(".ui-dialog-buttonset").remove();
                $("#main-login-form").html(ajaxError);
            }
        },
        success: function(data){
            if(data.flag=='true'){        
                $("#msgs").addClass("success");
                $("#msgs").show();
                $("#msgs").html(data.msg)
                $("#login_form").submit();
            }else{
                $("#msgs").addClass("error");
                $("#msgs").show();
                $("#msgs").html(data.msg)
                setTimeout(function(){
                    $("#msgs").hide('fast');
                },3000)
            }
        },
        error: function(){
            $(".ui-dialog-buttonset").remove();
            $(this).html(ajaxError);
        }
    })
}
</script>