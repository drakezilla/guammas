<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php use_javascript('custom/GoogleMapsApi.Class.js', 'last') ?>
<script>
    var mapa= new GoogleMapClass();
    $(document).ready(function(){
        mapa.inicio(document.getElementById('map_canvas'),false);
        getUbicaciones(false)
    })
    
    function getUbicaciones(recargar){
        $.ajax({
            url: '<?php echo url_for('@getUbicaciones?token=' . $sf_request->getParameter('token')) ?>',
            dataType: 'json',
            success: function(data){
                ubicaciones = data
                mapa.precargarUbicaciones(ubicaciones,true)
                if(recargar){
                    $("#popup-form").dialog('close')
                }
            }
        })
    }
</script>