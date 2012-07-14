<?php use_javascript("jquery-plugins/jquery_maskedInput.js") ?>
<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php //use_javascript('custom/googlemaps_api.js', 'last')         ?>
<?php use_javascript('class.js') ?>
<script>
    var mostrarPopup;
    var popupHtml = 
        '<p>Para guardar una nueva ubicación, solo haz click en el mapa donde esta tu tienda. Llena los datos del formulario y haz click en aceptar</p>'+
        '<div style="margin-left: auto; margin-right: auto"><input type="checkbox" id="chk_nomostrar" />Okay, ya lo sé, no mostrar este mensaje de nuevo. Gracias</div>';
    var gMap;
    $(document).ready(function(){
        $("#popup-info").dialog({
            title: "Como crear nuevas sucursales",
            autoOpen: false,
            modal: false,
            width: 540,
            open: function() {
                $(this).html(popupHtml);
            },
            close: function() {
                if($("#chk_nomostrar").is(":checked")){
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo url_for('cpanel/nomostrar?token=' . $sf_request->getParameter('token')) ?>',
                        data:{
                            nomostrar: $("#chk_nomostrar").val()
                        }
                    })
                }
                $(this).html('')
            }
        });
        $.ajax({
            url: '<?php echo url_for('@getSucursales?token=' . $sf_request->getParameter('token')) ?>',
            dataType: 'json',
            success: function(data){
                gMap= new mapaNuevaUbicacion();
                gMap.inicio(document.getElementById('map_canvas'));
                gMap.precargarUbicaciones(data,true)
            }
        })
        $.ajax({
            url: '<?php echo url_for('cpanel/config?token=' . $sf_request->getParameter('token')) ?>',
            success: function(data){
                mostrarPopup = data
            }
        })
        $("#ubicacion-nueva-ubicacion").click(function(){
            mivar= gMap.mapActividad( );
            if(mostrarPopup!='no'){
                $("#popup-info").dialog('open')
            }
        })
        
    });
    
    function guardarUbicacion(){
        $.ajax({
            type:  'POST',
            url: '<?php echo url_for('cpanel/guardarUbicacion?token=' . $sf_request->getParameter('token')) ?>',
            data: {
                rif: $("#ubicacion_rif").val(),
                nombre: $("#ubicacion_nombre").val(),
                telefono: $("#ubicacion_telefono").val(),
                coordenada_x: $("#ubicacion_coordenada_x").val(),
                coordenada_y: $("#ubicacion_coordenada_y").val()
            },
            success: function (data){
                alert("llegamos")
            }
        })
    }
    
</script>