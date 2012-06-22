<?php use_stylesheet('custom/customJqueryTabs.css') ?>
<script>

    var main_newuser_checked = true
    var main_mail_checked = true
    
    $(document).ready(function(){
        $("#tabs").tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
        $("#tabs li").removeClass('ui-corner-top').addClass('ui-corner-left');
        $("#usuario_nombre_usuario").blur(function(){
            if($(this).val()!='<?php echo $sf_user->getAttribute("usuario_username", '', "user_vars") ?>'){
                main_newuser_checked = checkUsuario($("#usuario_nombre_usuario"),$("#look_spinner"),'editar')
            }
        });
        $("#usuario_correo_electronico").blur(function(){
            if($(this).val()!='<?php echo $sf_user->getAttribute("usuario_email", '', "user_vars") ?>'){
                main_mail_checked = checkEmail($(this),$("#check_email"),'editar');
            }
        });
    
        $("#usuario_form").submit(function(){
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
        })
    })    
    $(document).ready(function(){
        $("#usuario_red_social_red_social_id").chosen();
        $("#usuario_red_social_red_social_id_chzn").removeAttr("style");
        $(".chzn-drop").css("width","215px");
        $(".tooltip").qtip({
            position: {
                corner: {
                    target: 'rightMiddle',
                    tooltip: 'leftMiddle'
                }
            },
            content: 'La direccion de tu perfil debe ser algo asi: <ul><li>http://twitter.com/minombre</li><li>http://facebook.com/minombre</li><li>http://youtube.com/minombre</li></ul>',
            style: { 
                width: 260,
                background: '#FFF',
                color: 'black',
                textAlign: 'left',
                border: {
                    width: 7,
                    radius: 5,
                    color: '#F7A66B'
                },
                tip: 'leftMiddle',
                name: 'dark' // Inherit the rest of the attributes from the preset dark style
            }
                
        });
    })
</script>