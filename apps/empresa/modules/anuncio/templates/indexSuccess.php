<h1>Lista de anuncios</h1>

<table>
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
            <th>Tipo anuncio</th>
            <th>Horario anuncio</th>
            <th>Activo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($anuncios as $anuncio): ?>
            <tr>
                <td><a href="<?php echo url_for('anuncio/edit?id=' . $anuncio->getId()) ?>"><?php echo $anuncio->getTitulo() ?></a></td>
                <td><?php echo $anuncio->getFechaInicio() ?></td>
                <td><?php echo $anuncio->getFechaFin() ?></td>
                <td><?php echo $anuncio->getTipoAnuncio() ?></td>
                <td><?php echo $anuncio->getHorarioAnuncio() ?></td>
                <td><?php echo !$anuncio->getActivo() ? image_tag('stylistica-icons/24x24/delete.png') : image_tag('stylistica-icons/24x24/checkmark.png'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo url_for('anuncio/new?token=' . $sf_request->getParameter('token')) ?>">New</a>
