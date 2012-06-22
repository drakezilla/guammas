<?php use_javascript("jquery-plugins/jquery_tooltip.js") ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
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
            <th><?php echo $formUsuario['perfil_facebook']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['perfil_facebook']->renderError() ?>
                <?php echo $formUsuario['perfil_facebook'] ?>
            </td>
            <td>
                connectar
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['perfil_twitter']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['perfil_twitter']->renderError() ?>
                <?php echo $formUsuario['perfil_twitter'] ?>
            </td>
            <td>
                connectar
            </td>
        </tr>
    </tbody>
</table>