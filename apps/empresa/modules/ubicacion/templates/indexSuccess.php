<?php include_partial('assets') ?>
<div id="titulo">
    <h3>Ubicaciones y Sucursales</h3>
    <div><?php echo image_tag('tabs/linea.png') ?></div>
</div>
<div class="notice" id="notice-geocoder"></div>
<div class="span-21 last" id="map_canvas" style="height: 350px; margin-top: 20px"></div>
<div class="span-24" last>
    <a id="ubicacion-nueva-ubicacion" href="#">Nueva ubicación</a>
</div>
<div id="popup-info"></div>
<div id="popup-form"></div>
<div id="popup-ciudad" style="text-align: left;">
    <div>
        <span style="vertical-align: top"><strong>Selecciona una ciudad</strong></span>
        <span><?php echo $form["ciudad_id"] ?></span>
    </div>
</div>