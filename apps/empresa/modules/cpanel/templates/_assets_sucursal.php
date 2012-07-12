<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php //use_javascript('custom/googlemaps_api.js', 'last')       ?>
<?php use_javascript('class.js') ?>
<script>

    var gMap;
    $(document).ready(function(){
        $.ajax({
            url: '<?php echo url_for('@getSucursales?token=' . $sf_request->getParameter('token')) ?>',
            dataType: 'json',
            success: function(data){
                gMap= new GoogleMapClass();
                gMap.inicio(document.getElementById('map_canvas'));
                gMap.precargarUbicaciones(data,true)
            }
        })
    });
    
</script>
