<?php use_javascript("jquery-plugins/jquery_tooltip.js") ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
<?php use_stylesheet("apps/frontend/modules/usuario/form_red_social.css") ?>
<?php if (!$formUsuario->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<table>
    <tfoot>
        <tr>
            <td colspan="2">
                <?php echo $formUsuario->renderHiddenFields(false) ?>
            </td>
        </tr>
    </tfoot>
    <tbody>
        <?php echo $formUsuario->renderGlobalErrors() ?>
        <tr>
            <th><?php echo $formUsuario['pref_correo_electronico_publico']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['pref_correo_electronico_publico']->renderError() ?>
                <?php echo $formUsuario['pref_correo_electronico_publico'] ?>
            </td>
        </tr>
    </tbody>
</table>