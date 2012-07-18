
<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php use_javascript('class.js') ?>
<script>
    var mapa= new GoogleMapClass();
    $(document).ready(function(){
        mapa.inicio(document.getElementById('map_canvas'),false);
        getUbicaciones(false)
    })
    
    function getUbicaciones(recargar){
        $.ajax({
            url: '<?php echo url_for('@getUbicaciones?token=' . $sf_request->getParameter('token')) ?>',
            dataType: 'json',
            success: function(data){
                ubicaciones = data
                mapa.precargarUbicaciones(ubicaciones,true)
                if(recargar){
                    $("#popup-form").dialog('close')
                }
            }
        })
    }

</script>
<div class="form_container_rounded content_window" >
    <div id="map_canvas" style="width:750px; height:300px;">


    </div>
    <div class="span-19 last" style="margin-top:30px; padding-left: 30px">
        <div class="span-6">
            <a class="sucursal_verde" href="<?php echo url_for("@ubicacion?token=" . $sf_request->getParameter('token')) ?>">sucursal</a>
            <div class="lorem_ipsum  colborder">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor erat quis dui facilisis molestie...
                <a class="sucursal_verde" style="font-size:12px" href="<?php echo url_for("@ubicacion?token=" . $sf_request->getParameter('token')) ?>">más</a>
            </div>
        </div>
        <div class="span-6">
            <a class="anuncio_morado" href="<?php echo url_for("@anuncio?token=" . $sf_request->getParameter('token')) ?>">anuncio</a>
            <div class="lorem_ipsum  colborder" >
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor erat quis dui facilisis molestie...
                <a class="anuncio_morado" style="font-size:12px" href="<?php echo url_for("@anuncio?token=" . $sf_request->getParameter('token')) ?>">más</a>
            </div>
        </div>
        <div class="span-6 last">
            <a class="cuenta_azul" href="<?php echo url_for("cpanel/cuenta?token=" . $sf_request->getParameter('token')) ?>">cuenta</a>
            <div class="lorem_ipsum">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor erat quis dui facilisis molestie...
                <a class="cuenta_azul" style="font-size:12px" href="<?php echo url_for("cpanel/cuenta?token=" . $sf_request->getParameter('token')) ?>">más</a>
            </div>
        </div>
    </div>
    <div class="hr_window"></div>
    <div class="span-19 last" style="margin-top:30px; padding-left: 30px">
        <div class="span-6">
            <a class="sucursal_verde" style="margin-left: 25px" href="<?php echo url_for("@ubicacion?token=" . $sf_request->getParameter('token')) ?>">últimos anuncios</a>
            <div class="lorem_ipsum  colborder">
                <ul>
                <?php for ($i = 0; $i < count($ultimosAnuncios); $i++): ?>
                    <li><?php echo $ultimosAnuncios[$i]['titulo'] ?></li>
                <?php endfor; ?>
                </ul>
                    <a class="sucursal_verde" style="font-size:12px" href="<?php echo url_for("@ubicacion?token=" . $sf_request->getParameter('token')) ?>">más</a>
            </div>
        </div>
        <div class="span-6">
            <a class="anuncio_morado" style="margin-left: 49px" href="<?php echo url_for("@anuncio?token=" . $sf_request->getParameter('token')) ?>">¡certificate!</a>
            <div class="lorem_ipsum  colborder" >
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor erat quis dui facilisis molestie...
                <a class="anuncio_morado" style="font-size:12px" href="<?php echo url_for("@anuncio?token=" . $sf_request->getParameter('token')) ?>">más</a>
            </div>
        </div>
        <div class="span-6 last">
            <a class="cuenta_azul" style="margin-left: 25px" href="<?php echo url_for("cpanel/cuenta?token=" . $sf_request->getParameter('token')) ?>">últimos comentarios</a>
            <div class="lorem_ipsum">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor erat quis dui facilisis molestie...
                <a class="cuenta_azul" style="font-size:12px" href="<?php echo url_for("cpanel/cuenta?token=" . $sf_request->getParameter('token')) ?>">más</a>
            </div>
        </div>
    </div>
</div>