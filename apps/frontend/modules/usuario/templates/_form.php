<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php include_partial("assets") ?>

<form id="bien_login_form" action="<?php echo url_for('usuario/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th><?php echo $form['nombre_usuario']->renderLabel() ?></th>
                <td>
                    <?php echo $form['nombre_usuario']->renderError() ?>
                    <?php echo $form['nombre_usuario'] ?>
                    <div class="parent_help">
                        <span id="look_spinner"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['correo_electronico']->renderLabel() ?></th>
                <td>
                    <?php echo $form['correo_electronico']->renderError() ?>
                    <?php echo $form['correo_electronico'] ?>
                    <div class="parent_help">
                        <span id="check_email"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['contrasena']->renderLabel() ?></th>
                <td>
                    <?php echo $form['contrasena']->renderError() ?>
                    <?php echo $form['contrasena'] ?>
                </td>
            </tr>
            <tr>
                <th style="text-align: right"><input type="checkbox" id="deacuerdo" name="deacuerdo" /></th>
                <td id="check_deacuerdo">
                    Haciendo click aqui estoy de acuerdo con los <br /><a href="#">Terminos y condiciones</a> de Guammas
                </td>
            </tr>
        </tbody>
    </table>
</form>