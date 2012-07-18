<script>
    $(document).ready(function(){
        $("#anuncio_fecha_inicio, #anuncio_fecha_fin, ").datepicker();
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
            <th><?php echo $formExtra['fecha_disfrute_inicio']->renderLabel() ?></th>
            <td>
                <?php echo $formExtra['fecha_disfrute_inicio']->renderError() ?>
                <?php echo $formExtra['fecha_disfrute_inicio'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['fecha_fin']->renderLabel() ?></th>
            <td>
                <?php echo $form['fecha_fin']->renderError() ?>
                <?php echo $form['fecha_fin'] ?>
            </td>
            <th><?php echo $formExtra['fecha_disfrute_fin']->renderLabel() ?></th>
            <td>
                <?php echo $formExtra['fecha_disfrute_fin']->renderError() ?>
                <?php echo $formExtra['fecha_disfrute_fin'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formExtra['cantidad_inicial']->renderLabel() ?></th>
            <td colspan="2">
                <?php echo $formExtra['cantidad_inicial']->renderError() ?>
                <?php echo $formExtra['cantidad_inicial'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formExtra['cantidad_persona']->renderLabel() ?></th>
            <td colspan="2">
                <?php echo $formExtra['cantidad_persona']->renderError() ?>
                <?php echo $formExtra['cantidad_persona'] ?>
            </td>
        </tr>
    </tbody>
</table>