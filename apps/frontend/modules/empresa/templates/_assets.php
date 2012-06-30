<script>
    var htmlMapa='<a onclick="return openMapa()" href="#"><?php echo image_tag("16x16/small_bulb") ?>Ubicate en un mapa</a>'
    var htmlMapa='<a onclick="return openMapa()" href="#"><?php echo image_tag("16x16/small_bulb") ?>Ubicate en un mapa</a>'
    $(document).ready(function(){
        $("#ubicacion_rif").mask("r-99999999-9");
        $("#ubicacion_telefono_1").mask("0999-9999999");
        
        $("#ubicacion_ciudad_id, #organizacion_categoria_id").chosen();
       
        $("#ubicacion_ciudad_id").change(function(){
            $("#ubicacion_mapa_exacta").html('<?php echo image_tag("16x16/small_spinner.gif") ?>');
            setTimeout(function(){
                openMapa();
                $("#ubicacion_mapa_exacta").html(htmlMapa)    
            },2000)
            
        });
        
        $("#action_map").dialog({
            title: "Ubica tu tienda en el mapa",
            modal: true,
            autoOpen: false,
            width: 800,
            height: 500,
            close: function(event, ui) {
                $(this).html("");
                $(".popup-powered-by").remove();
            },
            buttons: {
                "Listo!": function() {
                    $(this).dialog("close");
                }
            }
        })
    })
    
    function openMapa(){
    
    $(".ui-dialog-buttonpane").css("text-align","right");
    $(".ui-dialog-buttonpane").css("vertical-align","middle");
    $(".ui-dialog-buttonpane").prepend("<div class='popup-powered-by'>Powered by <a target='_blank' href='http://google.com/maps'>Google Maps</a></div>")
        $("#action_map").dialog("open")
        $.ajax({
            type: 'POST',
            data:{
                geostring: $('#ubicacion_ciudad_id :selected').text()
            },
            url: '<?php echo url_for("empresa/mapa") ?>',
            statusCode: {
                404: function() {
                    $("#action_map").html(ajaxError);
                }
            },
            success: function(data){
                $("#action_map").html(data);
            }
        })
    }
</script>