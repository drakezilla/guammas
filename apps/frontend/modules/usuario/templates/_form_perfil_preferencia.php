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
        <tr>
            <th><?php echo $formUsuario['pref_enlace_facebook']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['pref_enlace_facebook']->renderError() ?>
                <?php echo $formUsuario['pref_enlace_facebook'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['pref_enlace_googleplus']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['pref_enlace_googleplus']->renderError() ?>
                <?php echo $formUsuario['pref_enlace_googleplus'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['pref_enlace_twitter']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['pref_enlace_twitter']->renderError() ?>
                <?php echo $formUsuario['pref_enlace_twitter'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['pref_notificacion_oferta']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['pref_notificacion_oferta']->renderError() ?>
                <?php echo $formUsuario['pref_notificacion_oferta'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['pref_notificacion_cupon']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['pref_notificacion_cupon']->renderError() ?>
                <?php echo $formUsuario['pref_notificacion_cupon'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['pref_notificacion_evento']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['pref_notificacion_evento']->renderError() ?>
                <?php echo $formUsuario['pref_notificacion_evento'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['pref_noticia_guamma']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['pref_noticia_guamma']->renderError() ?>
                <?php echo $formUsuario['pref_noticia_guamma'] ?>
            </td>
        </tr>
    </tbody>
</table>