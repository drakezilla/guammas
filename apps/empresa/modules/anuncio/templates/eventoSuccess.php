<script>
    $(document).ready(function(){
        $("#anuncio_evento_ciudad_id").chosen();
        $("#anuncio_fecha_inicio, #anuncio_fecha_fin").datepicker();
        $("#anuncio_evento_ciudad_id").change(function(){
            var geostring = $('#anuncio_evento_ciudad_id :selected').text();
            mapaEvento.callGeocoder(geostring);
        })
    })
    mapaEvento.inicio(document.getElementById('map_canvas'),true);
    mapaEvento.mapActividad();
</script>
<?php echo $formExtra['coordenada_x'] ?>
<?php echo $formExtra['coordenada_y'] ?>
<table>
    <tbody>
        <?php echo $form->renderGlobalErrors() ?>
        <tr>
            <th><?php echo $formExtra['ciudad_id']->renderLabel() ?></th>
            <td>
                <?php echo $formExtra['ciudad_id']->renderError() ?>
                <?php echo $formExtra['ciudad_id'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div style="width: 750px; height: 200px" id="map_canvas"></div>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['fecha_inicio']->renderLabel() ?></th>
            <td>
                <?php echo $form['fecha_inicio']->renderError() ?>
                <?php echo $form['fecha_inicio'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['fecha_fin']->renderLabel() ?></th>
            <td>
                <?php echo $form['fecha_fin']->renderError() ?>
                <?php echo $form['fecha_fin'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formExtra['telefono_evento']->renderLabel() ?></th>
            <td>
                <?php echo $formExtra['telefono_evento']->renderError() ?>
                <?php echo $formExtra['telefono_evento'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formExtra['pagina_web_evento']->renderLabel() ?></th>
            <td>
                <?php echo $formExtra['pagina_web_evento']->renderError() ?>
                <?php echo $formExtra['pagina_web_evento'] ?>
            </td>
        </tr>
    </tbody>
</table>