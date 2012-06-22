<script>
    var main_newuser_checked = false
    var main_mail_checked = false
    $("#usuario_nombre_usuario").blur(function(){
        main_newuser_checked = checkUsuario($("#usuario_nombre_usuario"),$("#look_spinner"))
    });
    
    $("#usuario_correo_electronico").blur(function(){
        main_mail_checked = checkEmail($(this),$("#check_email"));
    });
    
    $("#bien_login_form").submit(function(){
        if(main_newuser_checked==false){
            $("#look_spinner").html('<?php echo image_tag('16x16/small_cross') ?> El usuario no se ha verificado aun!')
            $("#usuario_nombre_usuario").stop().css("background-color", "#fe4f4f").animate({ backgroundColor: "#FFFFFF"}, 1000);            
            $("#usuario_nombre_usuario").focus();
            return false;
        }
        if(main_mail_checked==false){
            $("#check_email").html('<?php echo image_tag('16x16/small_cross') ?> El correo no se ha verificado aun!')
            $("#usuario_correo_electronico").stop().css("background-color", "#fe4f4f").animate({ backgroundColor: "#FFFFFF"}, 1000);            
            $("#usuario_correo_electronico").focus();
            return false;
        }
        if(!$("#deacuerdo").is(" :checked")){
            $("#check_deacuerdo").html('<?php echo image_tag('16x16/small_cross') ?> Debes estar de acuerdo con nuestros terminos y condiciones!')
            $("#deacuerdo").stop().css("background-color", "#fe4f4f").animate({ backgroundColor: "#FFFFFF"}, 1000);            
            $("#deacuerdo").focus();
            return false;
        }
    })
</script>