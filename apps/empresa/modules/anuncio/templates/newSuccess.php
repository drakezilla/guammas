<?php use_javascript('jquery-plugins/jwysiwyg/jquery.wysiwyg.js') ?>
<?php use_javascript('jquery-plugins/jwysiwyg/wysiwyg.image.js') ?>
<?php use_javascript('jquery-plugins/jwysiwyg/wysiwyg.link.js') ?>
<?php use_javascript('jquery-plugins/jwysiwyg/wysiwyg.table.js') ?>
<?php use_stylesheet('jquery-plugins/jquery_wysiwyg.css') ?>
<?php use_stylesheet("custom/customtabs.css") ?>
<?php use_stylesheet("modules/usuario/usuario_edit.css") ?>
<?php include_partial('assets') ?>
<script>
    (function($) {
        $(document).ready(function() {
            $('#anuncio_descripcion').wysiwyg({
                controls: {
                    
                    subscript  : { visible: false },
                    superscript: { visible: false },
                    
                    createLink : { visible: false },
                    unLink: { visible : true },
			
                    code : { visible: false },
                    removeFormat : { visible: false },
			
                    h1 : { visible : false },
                    h2 : { visible : false },
                    h3 : { visible : false }
                },
                initialContent: ""
            });
        });
    })(jQuery);
</script>
<h1>Nuevo Anuncio</h1>
<form action="<?php echo url_for('anuncio/' . ($form->getObject()->isNew() ? 'create' : 'update') . '?token=' . $sf_request->getParameter('token') . (!$form->getObject()->isNew() ? '&id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>

    <div class="span-21 last form_container_rounded">
        <div id="pestanas">
            <div id="header">
                <ul id="lista-pestana">
                    <li id="btn_prefe"><div><a href="#tab-prefe">Datos Básicos</a></div></li>
                    <li id="btn_redes"><div><a href="#tab-redes">Tipo de anuncio</a></div></li>
                    <li id="btn_priva"><div><a href="#tab-priva">Ubicaciones</a></div></li>
                </ul>
            </div>
            <div id="contenido" style="padding-left: 40px; padding-top: 20px;">
                <div id="tab-prefe">
                    <?php include_partial('formBasico', array('form' => $form)) ?>
                </div>
                <div id="tab-redes" class="tab-hide">
                    <?php include_partial('formTipo', array('form' => $form)) ?>
                </div>
                <div id="tab-priva" class="tab-hide">
                    <?php include_partial('formUbicacion', array('form' => $form, 'formUbicacion' => $formUbicacion)) ?>
                </div>
            </div>
        </div>
        <div id="pestana-footer">
            <?php echo $form->renderHiddenFields(false) ?>
            &nbsp;<a href="<?php echo url_for('anuncio/index?token=' . $sf_request->getParameter('token')) ?>">Volver</a>
            <?php if (!$form->getObject()->isNew()): ?>
                &nbsp;<?php echo link_to('Borrar', 'anuncio/delete?token=' . $sf_request->getParameter('token') . '&id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
            <?php endif; ?>
            <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit" role="button" aria-disabled="false">
                <span class="ui-button-text">Publicar ahora</span>
            </button>
        </div>
    </div>
</form>