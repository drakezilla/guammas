
<?php use_javascript("jquery-plugins/jquery_maskedInput.js") ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php use_javascript('class.js') ?>
<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
<?php include_partial('actions') ?>
<script>
    var ubicaciones;
    var mostrarPopup;
    var gMap= new mapaNuevaUbicacion();
    var popupHtml = 
        '<p>Para guardar una nueva ubicación, solo haz click en el mapa donde esta tu tienda. Llena los datos del formulario y haz click en aceptar</p>'+
        '<div style="margin-left: auto; margin-right: auto"><input type="checkbox" id="chk_nomostrar" />Okay, ya lo sé, no mostrar este mensaje de nuevo. Gracias</div>';
    
    /**
     * Configuración inicial del modulo
     * Se verifica si existe el cookie para mostrar cuadro de información inicial 
     * Se inicia el mapa
     * Se cargas las ubicaciones
     */
    
    $(document).ready(function(){
        setupUI();
        checkConfig();
        gMap.inicio(document.getElementById('map_canvas'),true);
        getUbicaciones(false);
        
    })
    
    /**
     * Cuando se hace click en el boton de nuevas ubicaciones, si no hay cookie se muestra un popup de informacion
     * Luego se muestra un popup con las ciudades
     */
    
    $(document).ready(function(){
        $("#ubicacion-nueva-ubicacion").click(function(){
            gMap.mapActividad();
            if(mostrarPopup!='no'){
                $("#popup-info").dialog('open')
            }
            $("#popup-ciudad").dialog('open')
        })
    })
    
    function getUbicaciones(recargar){
        $.ajax({
            url: '<?php echo url_for('@getUbicaciones?token=' . $sf_request->getParameter('token')) ?>',
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
    function checkConfig(){
        $.ajax({
            url: '<?php echo url_for('@configCookie?token=' . $sf_request->getParameter('token')) ?>',
            success: function(data){
                mostrarPopup = data
            }
        })
    }
    
    function recargarMapa(){
        $("#popup-form").dialog({
            title: "Recargando...",
            autoOpen: false,
            modal: true,
            width: 400,
            height: 90,
            open: function() {
                $(this).html('Estamos recargando el mapa, por favor espera un momento<br /><div style="margin-left: auto; margin-right: auto"><?php echo image_tag('16x16/small_spinner.gif') ?></div>')
            },
            close: function(){
                $(this).html('')
            }
        })
        $("#popup-form").dialog('open')
        gMap.reinciarMapa();
        getUbicaciones(true);
        
    }
    
    function setupUI(){
        $("#ubicacion_ciudad_id").chosen();
        $("#popup-ciudad").dialog({
            title: "Selecciona una ciudad",
            autoOpen: false,
            modal: true,
            width: 510,
            height: 420,
            open: function() {
                $(".ui-dialog-titlebar-close").remove()
            },
            close: function(){
                
                var geostring = $('#ubicacion_ciudad_id :selected').text();
                $('#notice-geocoder').show('fast');
                if(!gMap.callGeocoder(geostring)){
                    var geostringEstado = geostring.split('-');
                    if(!gMap.callGeocoder(geostringEstado[1])){
                        $('#notice-geocoder').html('Lo sentimos, pero no encontramos '+geostringEstado[0]+' en el mapa, te ubicamos en el estado '+geostringEstado[1]+' para que puedas ubicarte mas fácil') 
                    }else{
                        $('#notice-geocoder').html('Tenemos un problema... no encontramos la ciudad '+geostringEstado[0]+' en el estado '+geostringEstado[1]+'. Estamos trabajando para que todas las ciudades esten dentro del sistema')
                    }
                }
                setTimeout(function(){
                    $('#notice-geocoder').hide('fast');
                },5000)
                
            },
            buttons: {
                "Listo!": function() {
                    if($('#ubicacion_ciudad_id').val()==undefined || $('#ubicacion_ciudad_id').val()=='' || $('#ubicacion_ciudad_id').val()==null){
                        return false;
                    }else{
                        $(this).dialog("close");
                    }
                }
            }
            
        })
    }
    
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
</script>