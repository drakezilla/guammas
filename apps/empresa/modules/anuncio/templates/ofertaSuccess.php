<script>
    $(document).ready(function(){
        $("#anuncio_fecha_inicio, #anuncio_fecha_fin").datepicker();
    })
</script>
<table>
    <tbody>
        <?php echo $form->renderGlobalErrors() ?>
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
    </tbody>
</table>