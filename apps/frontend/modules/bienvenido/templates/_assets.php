<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php use_javascript('custom/GoogleMapsApi.Class.js', 'last') ?>
<?php use_stylesheet('modules/bienvenido/bienvenido.css') ?>
<script>
    function getUbicaciones(recargar){
        $.ajax({
            url: '<?php echo url_for('@getUbicaciones') ?>',
            dataType: 'json',
            success: function(data){
                ubicaciones = data
                gMap.precargarUbicaciones(ubicaciones,true)
                if(recargar){
                    $("#popup-form").dialog('close')
                }
            }
        })
    }
    
    var gMap = new GoogleMapClass()
    $(document).ready(function(){
        gMap.inicio(document.getElementById('map_canvas'),false)
        getUbicaciones(false);
    })

    $(document).ready(function(){
        var hide=false;
        $('#reg-empresa-image').click(function(){
            if(!hide){
                var ancho = '32px';
                var margen= '908px';
                hide = true;
                $('#reg-empresa-image').html('<?php echo image_tag('stylistica-icons/24x24/left_arrow.png') ?>');
                $('#reg-empresa-text').fadeOut('fast');
            }else{
                var ancho = '350px';
                var margen= '590px';
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