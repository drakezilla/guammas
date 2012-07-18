<script>
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
                recargarMapa()
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
                recargarMapa()
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
                recargarMapa()
            }
        })
            
    }
</script>