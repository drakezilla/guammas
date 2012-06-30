<?php
$fullGeostring = str_replace("-", ",", $geostring);
$explodeGeostring = explode("-", $geostring);
$ciudadGeostring = $explodeGeostring[0];
$estadoGeostring = $explodeGeostring[1];
?>
<script type="text/javascript">
    var fullGeostring = '<?php echo $fullGeostring ?>';
    var ciudadGeostring = '<?php echo $ciudadGeostring ?>';
    var estadoGeostring = '<?php echo $estadoGeostring ?>';
    function ocultarAlertaGeocoder(){
        $("#alerta_geocoder").hide("fast")
    }
    $(document).ready(function(){
        initializeInteraccion(true,'map_canvas');
    })
</script>
<div class="notice" id="alerta_geocoder"></div>
<div>Necesitamos la ubicación de tu comercio o local</div>
<div id="map_canvas" style="width:100%; height:100%"></div>