<?php use_stylesheets_for_form($formOrganizacion) ?>
<?php use_javascripts_for_form($formOrganizacion) ?>
<?php use_javascript("http://maps.google.com/maps/api/js?sensor=true&language=es") ?>
<?php use_javascript('custom/GoogleMapsApi.Class.js', 'last') ?>
<?php use_javascript("jquery-plugins/jquery_maskedInput.js") ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
<?php use_stylesheet("modules/empresa/empresa.css") ?>
<?php include_partial('map_config') ?>
<script>
    var popupFooter = 
        "<div class='popup-powered-by'>"+
        "Powered by <a target='_blank' href='http://google.com/maps'>Google Maps</a>"+
        "</div>"+
        "<div class='popup-form-btn'>"+
        "<button class='form-btn form-btn-confirmar' type='button' onclick='$(\"#popup-mapa\").dialog(\"close\")'>"+
        "<span>Listo!</span>"+
        "</button>"+
        "</div>";
    var gMap = new mapaNuevaUbicacion();
    var geostring;
    var popupMapa = '<div class="notice" id="notice-geocoder"></div><div id="map_canvas" style="width:775px; height:415px"></div>'
    var htmlMapa='<a onclick="return openMapa()" href="#"><?php echo image_tag("16x16/small_bulb") ?>Ubicate en un mapa</a>'
    $(document).ready(function(){
        $("#ubicacion_rif").mask("r-99999999-9");
        $("#ubicacion_telefono_ppal").mask("0999-9999999");        
        $("#ubicacion_ciudad_id, #organizacion_categoria_id").chosen();       
        $("#ubicacion_ciudad_id").change(function(){
            geostring = $('#ubicacion_ciudad_id :selected').text()
            $("#ubicacion_mapa_exacta").html('<?php echo image_tag("16x16/small_spinner.gif") ?>');
            $("#popup-mapa").dialog({
                title: "Ubica tu tienda en el mapa",
                modal: true,
                autoOpen: false,
                width: 800,
                height: 550,
                open:function(event, ui) {
                    $("#popup-mapa").html(popupMapa);
                    $(".ui-dialog-buttonpane").html("");
                    $(".ui-dialog-buttonpane").css("text-align","right");
                    $(".ui-dialog-buttonpane").css("vertical-align","middle");
                    $(".ui-dialog-buttonpane").prepend(popupFooter)
                    gMap.inicio(document.getElementById('map_canvas'),true);
                    gMap.mapActividad();
                    gMap.callGeocoder(geostring);
                },
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
            $("#ubicacion_mapa_exacta").html(htmlMapa)
            $("#popup-mapa").dialog('open')
        });  
    })
</script>