<?php use_helper('Date') ?>
<script>
    function borrar(anuncioId){
        if(confirm('¿Está seguro de eliminar este anuncio?')){
            return true();
        }else{
            return false();   
        }
    }
</script>
<h1>Lista de anuncios</h1>

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
                <td><a href='<?php echo url_for('@borrarAnuncio?token='. $sf_request->getParameter('token').'&id='.$anuncio->getId()) ?>' onclick='borrar()'>Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo url_for('anuncio/new?token=' . $sf_request->getParameter('token')) ?>">Nuevo anuncio</a>