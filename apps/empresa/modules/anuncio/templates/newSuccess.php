<?php include_partial('assets') ?>
<form action="<?php echo url_for('anuncio/' . ($form->getObject()->isNew() ? 'create' : 'update') . '?token=' . $sf_request->getParameter('token') . (!$form->getObject()->isNew() ? '&id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <div class="prepend-4 span-20 last">
        <div class="form-header">
            <h3>Nueva anuncio</h3>
            <div class="form-separador"></div>
        </div>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>

        <div>
            <div id="pestanas">
                <div id="header">
                    <ul id="lista-pestana">
                        <li id="btn_prefe"><div><a href="#tab-prefe">Datos Básicos</a></div></li>
                        <li id="btn_redes"><div><a href="#tab-redes">Tipo de anuncio</a></div></li>
                        <li id="btn_priva"><div><a href="#tab-priva">Ubicaciones</a></div></li>
                    </ul>
                </div>
                <div id="contenido" style="padding-left: 40px; padding-top: 20px;">
                    <div id="tab-prefe" class="tab">
                        <?php include_partial('formBasico', array('form' => $form)) ?>
                    </div>
                    <div id="tab-redes" class="tab tab-hide">
                        <?php include_partial('formTipo', array('form' => $form)) ?>
                    </div>
                    <div id="tab-priva" class="tab tab-hide">
                        <?php include_partial('formUbicacion', array('form' => $form, 'formUbicacion' => $formUbicacion)) ?>
                    </div>
                </div>
            </div>
            <div id="pestana-footer">
                <?php echo $form->renderHiddenFields(false) ?>
                <?php if (!$form->getObject()->isNew()): ?>
                    &nbsp;<?php echo link_to('Borrar', 'anuncio/delete?token=' . $sf_request->getParameter('token') . '&id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                <?php endif; ?>
                    <div class="span-20 last" style="margin-bottom: 100px;">
                    <button class="form-btn form-btn-cancelar" style="font-size: 10px" type="button" onclick="history.go(-1)">
                        <span>Regresar</span>
                    </button>
                    <button class="form-btn form-btn-confirmar" style="font-size: 10px" type="button" onclick="location.href='<?php echo url_for('anuncio/new?token=' . $sf_request->getParameter('token')) ?>'">
                        <span>Publica ahora</span>
                    </button>
                </div>
            </div>
        </div>
</form>