<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php //use_javascript('custom/googlemaps_api.js', 'last')         ?>
<?php use_javascript('class.js') ?>
<script>

    var gMap;
    $(document).ready(function(){
        $("#popup-info").dialog({
            title: "Como crear nuevas sucursales",
            autoOpen: false,
            modal: false,
            width: 540,
            open: function() {
                $(this).html('Para guardar una nueva ubicación, solo haz click en el mapa donde esta tu tienda. Llena los datos del formulario y haz click en aceptar');
                $(".ui-dialog-buttonset").remove();
                $(this).dialog({
                    buttons: btnArray
                })
            },
            close: function() {
                $(this).html('')
            }
        });
        $.ajax({
            url: '<?php echo url_for('@getSucursales?token=' . $sf_request->getParameter('token')) ?>',
            dataType: 'json',
            success: function(data){
                gMap= new GoogleMapClass();
                gMap.inicio(document.getElementById('map_canvas'));
                gMap.precargarUbicaciones(data,true)
            }
        })
        $("#ubicacion-nueva-ubicacion").click(function(){
            gMap.mapActividad();
            $("#popup-info").dialog('open')
        })
    });
    
</script>
