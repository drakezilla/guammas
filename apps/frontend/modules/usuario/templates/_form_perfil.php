<div class=" prepend-4 span-20 last">
    <div class="form-header">
        <h3><?php echo $formUsuario->getObject()->getNombreUsuario() ?></h3>
        <div class="form-separador"></div>
    </div>
    <form id="usuario_form" action="<?php echo url_for('usuario/' . ($formUsuario->getObject()->isNew() ? 'create' : 'update') . (!$formUsuario->getObject()->isNew() ? '?id=' . $formUsuario->getObject()->getId() : '')) ?>" method="post" <?php $formUsuario->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
                <button class="form-btn form-btn-cancelar" type="button" onclick="location.href='<?php echo url_for("@homepage") ?>'">
                    <span>Regresar</span>
                </button>
                <button class="form-btn form-btn-confirmar" type="submit">
                    <span>Guardar</span>
                </button>
            </div>
        </div>
    </form>
</div>