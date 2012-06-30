<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <link rel="stylesheet" href="../css/map-layout.css" type="text/css" media="all" />
        <script type="text/javascript">
            $(document).ready(function(){
                var hide=false;
                $('#reg-empresa-image').click(function(){
                    if(!hide){
                        var ancho = '32px';
                        var margen= '318px';
                        hide = true;
                        $('#reg-empresa-image').html('<?php echo image_tag('stylistica-icons/24x24/left_arrow.png') ?>');
                        $('#reg-empresa-text').fadeOut('fast');
                    }else{
                        var ancho = '350px';
                        var margen= '0px';
                        hide = false;
                        $('#reg-empresa-image').html('<?php echo image_tag('stylistica-icons/24x24/right_arrow.png') ?>');
                        $('#reg-empresa-text').fadeIn('fast');
                    }
                    $(this).parent().animate({
                        width: ancho,
                        marginLeft: margen
                    })
                });
            })    
        </script>
    </head>
    <body>        
        <div class="container" id="main-container">
            <?php echo $sf_content ?>
            <?php include ('gui.php') ?>
        </div>

        <div id="lay-footer"></div>
        <div id="main-login-form"></div>
    </body>
</html>
