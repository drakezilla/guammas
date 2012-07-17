
<?php use_javascript("jquery-plugins/jquery_maskedInput.js") ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php //use_javascript('custom/googlemaps_api.js', 'last')                ?>
<?php use_javascript('class.js') ?>
<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
<script>
    var mostrarPopup;
    var popupHtml = 
        '<p>Para guardar una nueva ubicación, solo haz click en el mapa donde esta tu tienda. Llena los datos del formulario y haz click en aceptar</p>'+
        '<div style="margin-left: auto; margin-right: auto"><input type="checkbox" id="chk_nomostrar" />Okay, ya lo sé, no mostrar este mensaje de nuevo. Gracias</div>';
    var gMap= new mapaNuevaUbicacion();
    $(document).ready(function(){
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
                    $(this).dialog("close");
                }
            }
        })
        
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
                gMap.inicio(document.getElementById('map_canvas'),true);
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
            $("#popup-ciudad").dialog('open')
        })
        
    });
    
    function guardarUbicacion(){
        $('#ubicacion_btn_guardar').attr('disabled','disabled');
        $('#cell_btn_guardar').append('<?php echo image_tag('16x16/small_spinner.gif', array('id' => 'spinner')) ?>');
        $.ajax({
            type:  'POST',
            url: '<?php echo url_for('cpanel/guardarUbicacion?token=' . $sf_request->getParameter('token')) ?>',
            data: {
                rif: $("#ubicacion_rif").val(),
                nombre: $("#ubicacion_nombre").val(),
                telefono: $("#ubicacion_telefono_ppal").val(),
                coordenada_x: $("#ubicacion_coordenada_x").val(),
                coordenada_y: $("#ubicacion_coordenada_y").val(),
                ciudad_id: $("#ubicacion_ciudad_id").val()
            },
            success: function (){
                $('#notice-geocoder').show('fast');
                $('#notice-geocoder').html('Bien! ubicación creada con exito')
                setTimeout(function(){
                    $('#notice-geocoder').hide('fast');
                },5000)
                gMap.cerrarIW();
                gMap.destruirActividad();
            },
            error: function(){
                $('#notice-geocoder').show('fast');
                $('#ubicacion_btn_guardar').removeAttr('disabled');
                $('#spinner').remove();
            }
        })
    }
    
    function editarUbicacion(ubicacionId){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                ubicacion_id: ubicacionId
            },
            url: '<?php echo url_for('cpanel/editUbicacion?token=' . $sf_request->getParameter('token')) ?>',
            success: function(data){
                var formEdit=
                    "<div>"+
                    "<table>"+ 
                    "<tr>"+ 
                    "<th>Nombre de la ubicación<th>"+
                    "<td><input type='text' id='ubicacion_nombre' value='"+data[0].nombre+"' /><td>"+
                    "</tr>"+ 
                    "<tr>"+ 
                    "<th>Direccion especifica<th>"+
                    "<td><textarea id='ubicacion_direccion'>"+data[0].detalle_direccion+"</textarea><td>"+
                    "</tr>"+ 
                    "<tr>"+ 
                    "<th>Teléfono principal<th>"+
                    "<td><input type='text' id='ubicacion_telefono_ppal' value='"+data[0].telefono_ppal+"' /><td>"+
                    "</tr>"+ 
                    "<tr>"+ 
                    "<th>Teléfono secundario<th>"+
                    "<td><input type='text' id='ubicacion_telefono_sec'";
                if(data[0].telefono_sec==null){
                    formEdit+="value='' /><td>";
                }else{
                    formEdit+="value='"+data[0].telefono_sec+"' /><td>";
                }
                formEdit+=
                    "</tr>"+ 
                    "<tr>"+ 
                    "<td colspan='2'><button onclick='updateUbicacion("+ubicacionId+")'>Editar</button><td>"+
                    "</tr>"+ 
                    "</table>"+ 
                    "</div>"
                
                $("#popup-form").dialog({
                    title: "Editando",
                    autoOpen: false,
                    modal: true,
                    width: 690,
                    height: 500,
                    open: function() {
                        $(this).html(formEdit)
                    },
                    close: function(){
                        $(this).html('')
                    }
                })
                $("#popup-form").dialog('open')
            }
        })
    }
    
    function confirmarDeleteUbicacion(ubicacionId){
        var formEdit = "<strong>¿Estás seguro de querer eliminar esta ubicación?</strong>"
        $("#popup-form").dialog({
            title: "Estas seguro de eliminar",
            autoOpen: false,
            modal: true,
            width: 400,
            height: 200,
            buttons:{
                "Si, borrar!": function() {
                    deleteUbicacion(ubicacionId);
                },
                "No, no la borres!": function() {
                    $(this).close()
                }
            },
            open: function() {
                $(this).html(formEdit)
            },
            close: function(){
                $(this).html('')
            }
        })
        $("#popup-form").dialog('open')
    }
    
    function deleteUbicacion(ubicacionId){
        $.ajax({
            type: 'POST',
            data:{
                ubicacion_id: ubicacionId
            },
            url: '<?php echo url_for('cpanel/deleteUbicacion?token=' . $sf_request->getParameter('token')) ?>',
            success: function(){
                $('#notice-geocoder').show('fast');
                $('#notice-geocoder').html('Bien! ubicación borrar con exito')
                setTimeout(function(){
                    $('#notice-geocoder').hide('fast');
                },5000)
                gMap.cerrarIW();
                gMap.destruirActividad();
            }
        })
            
    }
    
    function updateUbicacion(ubicacionId){
        $.ajax({
            type: 'POST',
            data:{
                ubicacion_id: ubicacionId,
                ubicacion_nombre: $("#ubicacion_nombre").val(),
                ubicacion_direccion: $("#ubicacion_direccion").val(),
                ubicacion_telefono_ppal: $("#ubicacion_telefono_ppal").val(),
                ubicacion_telefono_sec: $("#ubicacion_telefono_sec").val()
            },
            url: '<?php echo url_for('cpanel/updateUbicacion?token=' . $sf_request->getParameter('token')) ?>',
            success: function(){
                $('#notice-geocoder').show('fast');
                $('#notice-geocoder').html('Bien! ubicación editada con exito')
                setTimeout(function(){
                    $('#notice-geocoder').hide('fast');
                },5000)
                gMap.cerrarIW();
                gMap.destruirActividad();
            }
            
        })
    }
    
</script>