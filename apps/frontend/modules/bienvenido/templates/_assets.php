<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php use_javascript('custom/GoogleMapsApi.Class.js', 'last') ?>
<script>
    var gMap = new GoogleMapClass()
    $(document).ready(function(){
        gMap.inicio(document.getElementById('map-container'),false)
        getUbicaciones(false);
    })
    
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
</script>