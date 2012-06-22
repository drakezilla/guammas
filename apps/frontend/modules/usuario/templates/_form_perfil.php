<?php use_stylesheets_for_form($formUsuario) ?>
<?php use_javascripts_for_form($formUsuario) ?>
<?php include_partial("assets_editar_usuario") ?>

<div class="span-24">
    <form id="usuario_form" action="<?php echo url_for('usuario/' . ($formUsuario->getObject()->isNew() ? 'create' : 'update') . (!$formUsuario->getObject()->isNew() ? '?id=' . $formUsuario->getObject()->getId() : '')) ?>" method="post" <?php $formUsuario->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Datos básicos</a></li>
                <li><a href="#tabs-2">Redes sociales</a></li>
                <li><a href="#tabs-3">Preferencias</a></li>
            </ul>
            <div id="tabs-1">
                <?php include_partial("form_perfil_usuario", array("formUsuario" => $formUsuario)) ?>
            </div>
            <div id="tabs-2">
                <?php include_partial("form_perfil_red_social", array("formUsuario" => $formUsuario)) ?>
            </div>
            <div id="tabs-3">
                <?php include_partial("form_perfil_preferencia", array("formUsuario" => $formUsuario)) ?>
            </div>
        </div>
        <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" onclick="history.go(-1)">
            <span class="ui-button-text">Regresar</span>
        </button>
        <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit" role="button" aria-disabled="false">
            <span class="ui-button-text">Guardar</span>
        </button>
    </form>
</div>