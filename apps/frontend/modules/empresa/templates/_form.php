<div class=" prepend-4 span-20 last">
    <div class="form-header">
        <h3>Nuevos comercios y empresas</h3>
        <div class="form-separador"></div>
    </div>
    <form id="empresa_form" action="<?php echo url_for('empresa/' . ($formOrganizacion->getObject()->isNew() ? 'create' : 'update') . (!$formOrganizacion->getObject()->isNew() ? '?id=' . $formOrganizacion->getObject()->getId() : '')) ?>" method="post" <?php $formOrganizacion->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <div class="span-12 colborder">
            <table class="form-fila-standard">
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <?php echo $formUbicacion->renderHiddenFields(false) ?>
                            <?php echo $formOrganizacion->renderHiddenFields(false) ?>
                            <button class="form-btn form-btn-cancelar" type="button" onclick="location.href='<?php echo url_for("@homepage") ?>'">
                                <span>Regresar</span>
                            </button>
                            <button class="form-btn form-btn-confirmar" type="submit">
                                <span>¡Inscribirme!</span>
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
        <div class="span-5 last prepend-1 pan-info"> Tu RIF e información fiscal es consultada directamente con el SENIAT, así que tus datos <strong>siempre seran confiables</strong></div>
        <div class="span-5 last prepend-1 inf-separador"></div>
        <div class="span-5 last prepend-1 pan-info" style="">Procura que tu teléfono sea verdadero. Así tus clientes estarán más comunicados contigo</div>
    </form>
    <div class="span-20">
        <div class="form-separador"></div>
        <div class="form-footer-info">
            <strong>Para nostros, tu seguridad es importante</strong><br />
            Guammas se compromete a resguardar tu información y no divulgarla ni compartirla con nadie, lee nuestros <a>terminos y condiciones</a> para mas detalles
        </div>
    </div>
</div>
<div id="popup-mapa"></div>