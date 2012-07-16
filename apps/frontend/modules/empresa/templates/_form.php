<form id="empresa_form" action="<?php echo url_for('empresa/' . ($formOrganizacion->getObject()->isNew() ? 'create' : 'update') . (!$formOrganizacion->getObject()->isNew() ? '?id=' . $formOrganizacion->getObject()->getId() : '')) ?>" method="post" <?php $formOrganizacion->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$formOrganizacion->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <div class="span-21 last form_container_rounded" id="div_form">
        <?php include_partial('form_header') ?>
        <div class="span-13">
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
                        <th><?php echo $formUbicacion['telefono_ppal']->renderLabel() ?></th>
                        <td>
                            <?php echo $formUbicacion['telefono_ppal']->renderError() ?>
                            <?php echo $formUbicacion['telefono_ppal'] ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="span-5 form_container_rounded last prepend-1 pan_info" style="margin-bottom: 20px;"> Tu RIF e información fiscal es consultada directamente con el SENIAT, así que tus datos <strong>siempre seran confiables</strong></div>
        <div class="span-5 form_container_rounded last prepend-1 pan_info" style="">Procura que tu teléfono sea verdadero. Así tus clientes estarán más comunicados contigo</div>
    </div>
        <div class="span-21 form_container_rounded last" id="div_form_footer">
            <strong>Para nostros, tu seguridad es importante</strong><br />
            Guammas se compromete a resguardar tu información y no divulgarla ni compartirla con nadie, lee nuestros <a>terminos y condiciones</a> para mas detalles
        </div>
</form>
<div id="action_map"></div>