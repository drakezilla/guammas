<?php use_helper('Date') ?>
<?php include_partial ('assets_index') ?>
<div class="prepend-4 span-20 last">
    <div class="form-header">
        <h3>Anuncios y ofertas</h3>
        <div class="form-separador"></div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Tipo anuncio</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anuncios as $anuncio): ?>
                <tr>
                    <td><?php echo $anuncio->getTitulo() ?></td>
                    <td><?php echo format_date($anuncio->getFechaInicio(), 'D', 'es') ?></td>
                    <td><?php echo format_date($anuncio->getFechaFin(), 'D', 'es') ?></td>
                    <td><?php echo $anuncio->getTipoAnuncio() ?></td>
                    <td><?php echo!$anuncio->getActivo() ? image_tag('stylistica-icons/24x24/delete.png') : image_tag('stylistica-icons/24x24/checkmark.png'); ?></td>
                    <td><a href='<?php echo url_for('@borrarAnuncio?token=' . $sf_request->getParameter('token') . '&id=' . $anuncio->getId()) ?>' onclick='borrar()'>Borrar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="span-20" last>
        <button class="form-btn form-btn-cancelar" style="font-size: 10px" type="button" onclick="history.go(-1)">
            <span>Regresar</span>
        </button>
        <button class="form-btn form-btn-confirmar" style="font-size: 10px" type="button" onclick="location.href='<?php echo url_for('anuncio/new?token=' . $sf_request->getParameter('token')) ?>'">
            <span>Nuevo Anuncio</span>
        </button>
    </div>
</div>


