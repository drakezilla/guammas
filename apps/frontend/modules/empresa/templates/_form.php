<?php use_stylesheets_for_form($formOrganizacion) ?>
<?php use_javascripts_for_form($formOrganizacion) ?>
<?php use_javascript("jquery-plugins/jquery_maskedInput.js") ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
<?php use_javascript("http://maps.google.com/maps/api/js?sensor=true&language=es") ?>
<?php use_javascript('custom/googlemaps_api.js','last') ?>
<?php include_partial("assets") ?>

<form action="<?php echo url_for('empresa/' . ($formOrganizacion->getObject()->isNew() ? 'create' : 'update') . (!$formOrganizacion->getObject()->isNew() ? '?id=' . $formOrganizacion->getObject()->getId() : '')) ?>" method="post" <?php $formOrganizacion->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <div class="span-21 last form_container_rounded" style="padding-top: 20px; padding-left: 10px; min-height: 350px">
    <?php if (!$formOrganizacion->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
        <table class="form-fila-standard">
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $formUbicacion->renderHiddenFields(false) ?>
                    <?php echo $formOrganizacion->renderHiddenFields(false) ?>
                    <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit" role="button" aria-disabled="false">
                        <span class="ui-button-text">Inscribirme ahora</span>
                    </button>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $formOrganizacion->renderGlobalErrors() ?>
            <tr>
                <th><?php echo $formUbicacion['rif']->renderLabel() ?></th>
                <td>
                    <?php echo $formUbicacion['rif']->renderError() ?>
                    <?php echo $formUbicacion['rif'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $formOrganizacion['nombre_organizacion']->renderLabel() ?></th>
                <td>
                    <?php echo $formOrganizacion['nombre_organizacion']->renderError() ?>
                    <?php echo $formOrganizacion['nombre_organizacion'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $formOrganizacion['categoria_id']->renderLabel() ?></th>
                <td>
                    <?php echo $formOrganizacion['categoria_id']->renderError() ?>
                    <?php echo $formOrganizacion['categoria_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $formUbicacion['ciudad_id']->renderLabel() ?></th>
                <td>
                    <?php echo $formUbicacion['ciudad_id']->renderError() ?>
                    <?php echo $formUbicacion['ciudad_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $formUbicacion['telefono_1']->renderLabel() ?></th>
                <td>
                    <?php echo $formUbicacion['telefono_1']->renderError() ?>
                    <?php echo $formUbicacion['telefono_1'] ?>
                </td>
            </tr>
        </tbody>
    </table>
  </div>
</form>

