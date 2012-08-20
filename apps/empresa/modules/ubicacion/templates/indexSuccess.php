<?php include_partial('assets') ?>
<div class="prepend-4 span-20 last">
    <div class="form-header">
        <h3>Ubicaciones y Sucursales</h3>
        <div class="form-separador"></div>
    </div>
    <div class="span-18 last" id="map_canvas" style="height: 350px;"></div>
    <div class="span-20" last>
        <button class="form-btn form-btn-cancelar" style="font-size: 10px" type="button" onclick="history.go(-1)">
            <span>Regresar</span>
        </button>
        <button class="form-btn form-btn-confirmar" style="font-size: 10px" type="button" id="ubicacion-nueva-ubicacion">
            <span>Nueva Ubicacion</span>
        </button>
    </div>
</div>
<div id="popup-info"></div>
<div id="popup-form"></div>
<div id="popup-ciudad" style="text-align: left;">
    <div>
        <span style="vertical-align: top"><strong>Selecciona una ciudad</strong></span>
        <span><?php echo $form["ciudad_id"] ?></span>
    </div>
</div>