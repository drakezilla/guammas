<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_stylesheet("custom/customtabs.css") ?>
<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php include_partial("flashes") ?>
<script>
    var main_newuser_checked = true
    var main_mail_checked = true
    
    $(document).ready(function(){
        $("#pestanas ul li div a").click(function(){
            var tabmostrar=$(this).attr('href');
            $("#pestanas #contenido div").slideUp('fast');
            $(tabmostrar).slideDown("fast");
            $("#pestanas ul li div a").css("color","#000")
            $(this).css("color","#E8782E")
            $("#pestanas ul li").removeClass('pestana_click');
            $(this).parent().parent().addClass('pestana_click');
        })
        
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
</script>