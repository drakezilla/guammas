<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php use_javascript('custom/GoogleMapsApi.Class.js', 'last') ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php use_javascript('jquery-plugins/jwysiwyg/jquery.wysiwyg.js') ?>
<?php use_javascript('jquery-plugins/jwysiwyg/wysiwyg.image.js') ?>
<?php use_javascript('jquery-plugins/jwysiwyg/wysiwyg.link.js') ?>
<?php use_javascript('jquery-plugins/jwysiwyg/wysiwyg.table.js') ?>
<?php use_stylesheet('jquery-plugins/jquery_wysiwyg.css') ?>
<?php use_stylesheet("custom/customtabs.css") ?>
<?php use_stylesheet("modules/usuario/usuario_edit.css") ?>
<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
<?php include_partial("map_config") ?>
<script>
    (function($) {
        $(document).ready(function() {
            $('#anuncio_descripcion').wysiwyg({
                controls: {
                    
                    subscript  : { visible: false },
                    superscript: { visible: false },
                    
                    createLink : { visible: false },
                    unLink: { visible : true },
			
                    code : { visible: false },
                    removeFormat : { visible: false },
			
                    h1 : { visible : false },
                    h2 : { visible : false },
                    h3 : { visible : false }
                },
                initialContent: ""
            });
        });
    })(jQuery);
</script>
<script>
    var html;
    var mapaEvento = new mapaNuevoEvento();
    $(document).ready(function(){
        $("#pestanas ul li div a").click(function(){
            var tabmostrar=$(this).attr('href');
            $("#pestanas #contenido .tab").slideUp('fast');
            $(tabmostrar).slideDown("fast");
            $("#pestanas ul li div a").css("color","#0066CC")
            $(this).css("color","#E8782E")
            $("#pestanas ul li").removeClass('pestana_click');
            $(this).parent().parent().addClass('pestana_click');
        })
        
        $("#anuncio_tipo_anuncio_id").change(function(){
            switch($(this).val()){
                case '1':        
                    html  = getForm('evento');
                    break;
                case '2': 
                    html  = getForm('oferta');
                    break;
                case '3': 
                    html  = getForm('cupon');
                    break;
                default:
                    alert('error')
                    return false;
                    break;
            }
        })
        
    })
    
    function getForm(ajaxform){
        $.ajax({
            type: 'POST',
            data: {
                form: ajaxform
            },
            url: '<?php echo url_for('@getForm?token='.$sf_request->getParameter('token')) ?>',
            success: function(data){
                $("#anuncio-form-adicional").html(data);
            }
        })
    }
    
</script>
