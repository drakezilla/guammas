<form id="usuario_form" action="<?php echo url_for('usuario/' . ($formUsuario->getObject()->isNew() ? 'create' : 'update') . (!$formUsuario->getObject()->isNew() ? '?id=' . $formUsuario->getObject()->getId() : '')) ?>" method="post" <?php $formUsuario->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <div class="span-21 last form_container_rounded">
        <?php include_partial('form_header') ?>
        <div id="pestanas">
            <div id="header">
                <ul id="lista-pestana">
                    <li id="btn_prefe"><div><a href="#tab-prefe">Datos de usuario</a></div></li>
                    <li id="btn_redes"><div><a href="#tab-redes">Redes Sociales</a></div></li>
                    <li id="btn_priva"><div><a href="#tab-priva">Privacidad</a></div></li>
                </ul>
            </div>
            <div id="contenido" style="padding-left: 40px; padding-top: 20px;">
                <div id="tab-prefe" class="tab">
                    <?php include_partial("form_perfil_usuario", array("formUsuario" => $formUsuario)) ?>
                </div>
                <div id="tab-redes" class="tab-hide tab">
                    <?php include_partial("form_perfil_red_social", array("formUsuario" => $formUsuario)) ?>
                </div>
                <div id="tab-priva" class="tab-hide tab">
                    <?php include_partial("form_perfil_preferencia", array("formUsuario" => $formUsuario)) ?>
                </div>
            </div>
            <div id="form-footer">
                <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" onclick="location.href='<?php echo url_for("@homepage") ?>'">
                    <span class="ui-button-text">Regresar</span>
                </button>
                <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit" role="button" aria-disabled="false">
                    <span class="ui-button-text">Guardar</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</form>