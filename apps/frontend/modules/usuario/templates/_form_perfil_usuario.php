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
            <th><?php echo $formUsuario['nombre_usuario']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['nombre_usuario']->renderError() ?>
                <?php echo $formUsuario['nombre_usuario'] ?>
                <div class="parent_help">
                    <span id="look_spinner"></span>
                </div>
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['correo_electronico']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['correo_electronico']->renderError() ?>
                <?php echo $formUsuario['correo_electronico'] ?>
                <div class="parent_help">
                    <span id="check_email"></span>
                </div>
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['nombre']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['nombre']->renderError() ?>
                <?php echo $formUsuario['nombre'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $formUsuario['apellido']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['apellido']->renderError() ?>
                <?php echo $formUsuario['apellido'] ?>
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top"><?php echo $formUsuario['avatar']->renderLabel() ?></th>
            <td>
                <?php echo $formUsuario['avatar']->renderError() ?>
                <?php echo $formUsuario['avatar'] ?>
                <?php if ($formUsuario->getObject()->getAvatar() != ""): ?><br /><br />
                    <div class="parent_help">
                        <span id="avatar_subido"><img style="width: 64px; height: 64px" src="/uploads/avatar/<?php echo $formUsuario->getObject()->getAvatar(); ?>" /></span>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
    </tbody>
</table>