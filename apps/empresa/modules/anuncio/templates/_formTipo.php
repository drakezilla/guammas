<div>
    <table>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th><?php echo $form['tipo_anuncio_id']->renderLabel() ?></th>
                <td>
                    <?php echo $form['tipo_anuncio_id']->renderError() ?>
                    <?php echo $form['tipo_anuncio_id'] ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div id="anuncio-form-adicional"></div>